@extends("frontend.pc.layout.layout")
@section("content")
    <div class="page-banner about-banner" style="background-image: url('{{url('/resources/views/frontend/pc/images/page-banner-5.jpg')}}')">
    <h5>{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}</h5>

    <h6>更值得信赖的移动平台</h6>
</div>
<!--page-banner-->

<div class="about-page">
    <div class="container">
        <h5>关于{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}</h5>

        <p>{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}（下面简称{{isset($commonSetting['website_simple_name'])?$commonSetting['website_simple_name']:''}}）移动端广告投放平台，致力于为广告主和媒介主（开发者、自媒体）提供更优质的移动营销服务，使双方营销资源价值更大化。</p>

        <p>{{isset($commonSetting['website_simple_name'])?$commonSetting['website_simple_name']:''}}，整合了智能手机领域大量优质媒体及广告资源，构建起一个公平、诚信、高效的广告营销服务平台，为广告主提供精准，高效的产品、品牌推广服务，同时为媒介主创造丰厚的广告收益。</p>

        <p>{{isset($commonSetting['website_simple_name'])?$commonSetting['website_simple_name']:''}}运营团队拥有多年网络营销实战经验，塑造了多个网络知名品牌，培养了一批高水平的技术研发人员和一支专业的营销服务团队。</p>

        <p>{{isset($commonSetting['website_simple_name'])?$commonSetting['website_simple_name']:''}}，以专业化的营销队伍，依靠先进的技术，科学规范的管理，强大的硬件设施和雄厚资金，我们有信心和实力为广大站长和广告主提供优质服务。</p>

        <p>热诚欢迎广大站长和广告主的加盟，共创美好未来!</p>

        <a href="/register.html" class="join">加入我们</a>
    </div>
</div>
<!--about-page-->


<!--kefu-page-->

    <script>
        $('.header-menu li').removeClass('active');
        $('.menu li').removeClass('active');
        $('.menu li:eq(4)').addClass('active');
        $('.header-menu li:eq(4)').addClass('active');
    </script>
@endsection