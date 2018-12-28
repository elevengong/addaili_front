<?php

namespace App\Http\Controllers\frontend;


class TestController extends FrontendController
{
    public function test(){
        $str = '';

        //$str = $str."document.writeln(\"<img src=\'http://www.feiyueun.com/public/uploads/20181208/1544281819lxJHy.gif\'> \");";
        //$str = $str."<img src='http://www.feiyueun.com/public/uploads/20181208/1544281819lxJHy.gif'>";

        //$str = $str."var div = document.createElement('div');div.innerHTML = '1111111111111'; document.documentElement.appendChild(div);";
        //$img = "<img src=\'http://www.feiyueun.com/public/uploads/20181208/1544281819lxJHy.gif\'>";

        $jsHtml = '';
        $jsHtml = $jsHtml."<div class=\'___vb\'>";
        $jsHtml = $jsHtml."<style>.___vb{display: block !important;} .__iaj a:nth-child(3) img {min-width:15px;min-height:15px;}</style>";
        $jsHtml = $jsHtml."<div id=\'_adimg\'>";
        $jsHtml = $jsHtml."<div style=\'position: fixed; top: 0px !important; z-index: 18888; width: 100%;\' id=\'__iaj\' class=\'__iaj\'>";
        $jsHtml = $jsHtml."<div></div>";
        $jsHtml = $jsHtml."<a href=\'http://www.baidu.com\' style=\'z-index:13121;position:relative;\' target=\'_blank\'>";
        $jsHtml = $jsHtml."<img src=\'http://daili.com/public/uploads/20181208/1544281819lxJHy.gif\' style=\'width:100% !important;\'></a>";
        $jsHtml = $jsHtml."<a style=\'right:1px;z-index:20000;position:absolute;float:right;bottom:0;\' href=\'javascript:;\' onclick=\"document.getElementById(\'_adimg\').style.cssText=\'display:none;\';document.getElementsByTagName(\'body\')[0].style.cssText=\'padding-top:0px;\';\" target=\"_self\">";
        $jsHtml = $jsHtml."<img src=\'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAPCAYAAAA71pVKAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NTc1ODExNjg3NEU3MTFFNkJFREM5MTZFMEVDODQ3NDEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NTc1ODExNjk3NEU3MTFFNkJFREM5MTZFMEVDODQ3NDEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo1NzU4MTE2Njc0RTcxMUU2QkVEQzkxNkUwRUM4NDc0MSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo1NzU4MTE2Nzc0RTcxMUU2QkVEQzkxNkUwRUM4NDc0MSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pj9auJoAAAJGSURBVHjadFMxTxRREP7m7Xt73HF7h4QohZWdNpyIxgvGwsrCRAoriKhUFv4CYzSxtbWGaEQtjMHCxJpIJOFEqPgBNlZnhPOO3fd2x5lVEiS6zezM933vvXwzQw+SLooc9TTlydhhIoqpxgUYRz4yoDzjfuaxXanQponQs0WBurHcSo5Ta9DlJntmawl8SE4EBM/gGCPJOLVCl4sipy2T7vOkG6OpmSdx88w1W/wcMIeMWQQqL6PmWldcecpXnYljmhh852T7XSjaCxZnZyx20wK53GQMyqi51hVXnvJVZyOLmh8Qd14E5D1C+64FaozNNzmSFNiT90/NinDe4uPTgC8rAbUhw9ahZgVj54BhJnxe8YgajOmFGMZ5rD0LmL4lwpsO68+94AFJhSBC9YStGqLm2JjQkGduLAd5K3D6isWJUxFGTxLWlzw2Xgc0qoTokJnmwNHyAEeoC7i67LH7jXH1YaWMmmtd8cNdMEfb0QuMy3MOjXHCh8dpGTXXuuLK+0tcCjNxdcA4P2dx8Y7DzmrA20dpGTXXuuLKOzjAyg95D/RTxrkZhwuzEdYWs9LtMTGn8yqgkBvb8w75LonbHjURiclk84A+VXlk6obl9m1th0dHXG0OmdLEJAM6L8XEPuHSPYeozth5n1O+T32TZbxdPUZ7E9et+bT4u4+NikEk5sjollFzrSuuPOWrju4Pd+sm4pYdpUmdbfL492wHHQhQdZR+yGxv6mxbGcFeEWhr7yub/23VnzaWWyU83aot3apfAgwA/hM+7qbqOzgAAAAASUVORK5CYII=\'>";
        $jsHtml = $jsHtml."</a></div></div></div>";

        $str = "var div = document.createElement('div');div.innerHTML = '".$jsHtml."'; document.documentElement.appendChild(div);document.getElementsByTagName('body')[0].style.cssText='padding-top:'+document.body.clientWidth/3+'px;';";
        echo $str;
        exit;
        //return view('frontend.pc.test');
    }
}