<?php

namespace App\Http\Controllers\backend;

use App\Model\Deposit;
use App\Model\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class DepositController extends MyController
{
    //广告商充值审核列表
    public function applydeposit(Request $request){
        if($request->isMethod('post'))
        {
            $member = request()->input('member');
            $DepositArray = Deposit::select('deposit.*','member.name','paytype.paytype')->where('deposit.status',0)
                ->leftJoin('member',function ($join){
                    $join->on('member.member_id','=','deposit.member_id');
                })
                ->leftJoin('paytype',function ($join){
                    $join->on('paytype.paytype_id','=','deposit.paytype_id');
                })
                ->where('member.name','like',$member . '%')
                ->orderBy('deposit.created_at', 'desc')->paginate($this->backendPageNum);
        }else{
            $DepositArray = Deposit::select('deposit.*','member.name','paytype.paytype')->where('deposit.status',0)
                ->leftJoin('member',function ($join){
                    $join->on('member.member_id','=','deposit.member_id');
                })
                ->leftJoin('paytype',function ($join){
                    $join->on('paytype.paytype_id','=','deposit.paytype_id');
                })
                ->orderBy('deposit.created_at', 'desc')->paginate($this->backendPageNum);
        }
        return view('backend.depositlist', compact('DepositArray'))->with('admin', session('admin'));
    }

    //处理广告商充值订单
    public function dealdepositorder(Request $request,$deposit_id){
        $DepositDetail = Deposit::select('deposit.*','member.name','paytype.paytype')->where('deposit.deposit_id',$deposit_id)
            ->leftJoin('member',function ($join){
                $join->on('member.member_id','=','deposit.member_id');
            })
            ->leftJoin('paytype',function ($join){
                $join->on('paytype.paytype_id','=','deposit.paytype_id');
            })->get()->toArray();
        return view('backend.dealdepositorder', compact('DepositDetail'));
    }

    //更新确认广告商充值订单
    public function updatedepositorder(Request $request,$deposit_id){
        if($request->isMethod('post'))
        {
            $status = request()->input('status');
            $remark = request()->input('remark');
            $member_id = request()->input('member_id');
            if($status == 1)
            {
                //充值成功
                DB::beginTransaction();
                try{
                    //行锁
                    $OrderDetail = Deposit::where('deposit_id',$deposit_id)->where('status',0)->lockForUpdate()->get()->toArray();
                    $MemberDetail = Member::where('member_id',$member_id)->lockForUpdate()->get()->toArray();

                    $result = Deposit::where('deposit_id', $deposit_id)->update(['status' => $status, 'remark' => $remark]);
                    $result1 = Member::where('member_id',$OrderDetail[0]['member_id'])->increment('balance',$OrderDetail[0]['money']);
                    if($result and $result1)
                    {
                        DB::commit();
                        $data['status'] = 1;
                        $data['msg'] = "充值订单处理成功";
                        echo json_encode($data);
                    }else{
                        DB::rollBack();
                        $data['status'] = 0;
                        $data['msg'] = "充值订单处理失败";
                        echo json_encode($data);
                    }
                }catch (\Exception $e) {
                    DB::rollBack();
                    $data['status'] = 0;
                    $data['msg'] = "Error!";
                    echo json_encode($data);
                }
            }else{
                //充值不成功的，只改变该订单的状态
                $result = Deposit::where('deposit_id', $deposit_id)->update(['status' => $status, 'remark' => $remark]);
                if ($result) {
                    $data['status'] = 1;
                    $data['msg'] = "充值订单更新成功";
                } else {
                    $data['status'] = 0;
                    $data['msg'] = "充值订单更新失败";
                }
                echo json_encode($data);
            }
        }
    }

    //广告商充值记录列表
    public function depositrecord(Request $request){
        if($request->isMethod('post'))
        {
            $member = request()->input('member');
            $DepositArray = Deposit::select('deposit.*','member.name','paytype.paytype')->where('deposit.status','!=','0')
                ->leftJoin('member',function ($join){
                    $join->on('member.member_id','=','deposit.member_id');
                })
                ->leftJoin('paytype',function ($join){
                    $join->on('paytype.paytype_id','=','deposit.paytype_id');
                })
                ->where('member.name','like',$member . '%')
                ->orderBy('deposit.updated_at', 'desc')->paginate($this->backendPageNum);

        }else{
            $DepositArray = Deposit::select('deposit.*','member.name','paytype.paytype')->where('deposit.status','!=','0')
                ->leftJoin('member',function ($join){
                    $join->on('member.member_id','=','deposit.member_id');
                })
                ->leftJoin('paytype',function ($join){
                    $join->on('paytype.paytype_id','=','deposit.paytype_id');
                })
                ->orderBy('deposit.updated_at', 'desc')->paginate($this->backendPageNum);
        }
        return view('backend.depositrecord', compact('DepositArray'))->with('admin', session('admin'));
    }











}
