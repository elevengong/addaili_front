@extends("frontend.pc.layout.layout")
@section("content")
<div class="agreement">
    <div class="con">
        <h2>{{isset($commonSetting['website_simple_name'])?$commonSetting['website_simple_name']:''}}({{isset($commonSetting['website_domain'])?$commonSetting['website_domain']:''}})会员注册协议</h2>
        <div class="agreement_txt">
            <p>{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}的各项服务所有权和运营权归{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}所有。{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}所提供的服务将按照其发布的服务条款和相关规定严格执行。用户需要完全同意注册协议以及相关规定，并且完成注册，通过审核后，才能成为{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}的合作会员。</p>
            <p>为了确保{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}的质量和信誉，我们将按照以下注册协议审核所有申请加入{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}的会员。</p>
            <p>如果违反以下注册协议，我们可能会停止提供服务或禁用{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员帐户。如果您的帐户被禁用，则无法进一步使用{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}提供的服务。</p>
            <p>请注意，我们可能随时更改我们的注册协议和政策，您申请并注册成为{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员，视为您同意遵守我们在此处发布的最新的注册协议和政策的规定。</p>
            <h3>一、申请资格</h3>
            <p>本服务条款中所指的{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员是指下述符合要求的网站、软件所有人：</p>
            <p>1．1　个人网站、软件：其所有人应为拥有中华人民共和国公民资格，具有完全的民事行为能力，并能够独立承担法律责任的自然人。</p>
            <p>1．2　商业网站、软件：商业网站、软件是指除个人网站、个人软件之外的，从事商务行为的企业法人、实体、组织机构等所拥有的网站。商业网站的所有人应为在中华人民共和国领域内合法登记注册的企业法人或实体、组织机构。</p>
            <p>1．3　对网站、软件的要求：{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员应保证其向{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}提交的网站已经获得了政府有关部门的所有许可和批准，有权进行网站、软件的运行和经营。网站、软件的经营严格遵守相关法律法规，网站、软件所进行的市场开拓、推广及相关经营活动合法。网站、软件不得包含但不限于以下内容（并且不得链接到有以下内容的网页）：</p>
            <p class="ti_2">(1)反对宪法所确定的基本原则的；</p>
            <p class="ti_2">(2)危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；</p>
            <p class="ti_2">(3)损害国家荣誉和利益的；</p>
            <p class="ti_2">(4)煽动民族仇恨、民族歧视，破坏民族团结的；</p>
            <p class="ti_2">(5)破坏国家宗教政策，宣扬邪教和封建迷信的；</p>
            <p class="ti_2">(6)散布谣言，扰乱社会秩序，破坏社会稳定的；</p>
            <p class="ti_2">(7)散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的；</p>
            <p class="ti_2">(8)侮辱或者诽谤他人，侵害他人合法权益的；</p>
            <p class="ti_2">(9)侵犯他人知识产权的，包括但不限于专利权、商标权、著作权；</p>
            <p class="ti_2">(10)侵犯他人商业秘密的；</p>
            <p class="ti_2">(11)含有法律、行政法规禁止的其他内容的；</p>
            <p class="ti_2">(12)网站内容必须健康向上，排版清晰美观；</p>
            <p class="ti_2">(13)单纯的，无实质性内容的广告页面；</p>
            <p class="ti_2">(14){{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}客户禁用内容；</p>
            <p class="ti_2">(15)无论个人网站还是商业网站，网站的所有人对自己的网页应具有完全的所有权、使用权、决策权等相应权利，并确保其网站的网页能够在移动端上正常显示。</p>
            <p>1．4 网站的所有人或软件作者必须拥有一个固定的常住地址或办公地址，并具有经常上网收发电子邮件的能力。</p>
            <p>1．5 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员是个人的，应如实提交身份证号码，否则将因为无法代扣代缴个人所得税导致无法取得分成收入。</p>
            <p>1．6 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}有权随时终止与{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员的合作，合作自{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}向{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员发出通知之日起终止，并不承担任何违约责任。</p>
            <h3>二、{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}开发者/网站主注册及服务投放流程</h3>
            <p>2．1 用户按照{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}网页提示注册后，该用户即成为{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}的有效会员。</p>
            <p>2．2 添加网站、创建广告位，并申请需要投放的广告，提交审核，1-2个工作日审核完毕。</p>
            <p>2．3 审核完成后，在“广告位列表”中显示广告位状态，如审核通过，用户使用自己的会员用户名和密码登陆{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}后台，自行进行代码获取、嵌入等操作，相关介绍请看{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}的帮助中心。</p>
            <p>2．4 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员自行将获取的代码投放到在自己的网站页面中，通过{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员的网站上的代码引导的有效显示、点击以及由{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}服务播放而产生的效果数据将被记录下来作为{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}与{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员结算的依据。（注：此依据不作为结算的唯一依据，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员在违反注册协议或者{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}相关政策时，其结算的依据将会随之改变。）</p>
            <p>2．5 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}每周周二开始结算工作，达到最低下限即可结算。结算金额未达到最低下限100元，将累计到下周结算。如果您对结算金额有异议，请于每周的第二个工作日之前联系工作人员沟通解决，否则视为同意，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}将会按照系统里的金额为您结算。如连续三个月累计金额未达到10元，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}将有权终止合作。</p>
            <h3>三、{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}广告主会员</h3>
            <p>3．1 关于费用：</p>
            <p class="ti_2">(1) 广告主须预先支付广告费用给启创，由启创根据实际投放情况实时扣除广告费，并通过启创统一支付给网站主会员；</p>
            <p class="ti_2">(2) 帐户余额 = 广告主预付费 - 广告费用；</p>
            <p class="ti_2">(3) 广告投放总价(即网站主会员广告费)由投放量、单价和最高点/弹比例自动计算得到，此值不能更改；</p>
            <p class="ti_2">(4) 当设定的广告投放期限结束或投放量结束时，广告将自动失效。</p>
            <p>3．2 帐户充值：根据您投放广告的情况，进行帐户充值，可选择两种方式支付，即在线支付和银行汇款；（附：广告金额须全部转换成广告投放量，不予返还。）</p>
            <p>3．3 制作广告内容：根据系统提供的多种广告规格，广告主可以自行制作广告内容，也可以委托启创制作，但启创需要收取一定的广告制作费用；</p>
            <p>3．4 发布广告：将制作的广告发布，请注意单价、有效期限及最高弹点比例的设定。费率一经设定，不能随意变动。因此，请广告主谨慎设定费率和广告的有效期；</p>
            <p>3．5 散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪内容的和恶意插件的，一经查证扣除所存费用并承担相应法律责任。</p>
            <h3>四、{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员的权利</h3>
            <p>4．1 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员在注册登记、得到{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}的确认后正式成为{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}的有效会员享有{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}提供的服务。</p>
            <p>4．2 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员在不违反注册协议或者{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}相关政策时，有权按{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}支付条款的规定获得{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}的分成。</p>
            <h3>五、{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员的义务</h3>
            <p>5．1 如果{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员的资料、信息等发生变化，包括网页地址、Email、联系电话等，应立刻通过{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}后台的个人资料修改及时更改，如由于{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员资料填写有误而导致的延误{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}与{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员的联系，由此造成的损失由{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员自己承担。</p>
            <p>5．2 在您出售网站、应用或进行其他交易时，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}帐户不可随同转让、过户或者转售。例如，当某个网站、应用的所有权或管理权发生变动时，先前的所有者或管理者必须撤消此网站、应用的{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}帐户，而新的所有者或管理者可以以自己的名义注册新的{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}帐户。</p>
            <p>5．3 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员应保管好自己的用户名和密码，不得透露给第三方。由于{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员对自己的帐号保管不当，造成的损失将有{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员自己承担。</p>
            <p>5．4 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员应该通过正当手段引导浏览者点击{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}服务，而不能采用任何欺骗性质的行为，如会员的不恰当行为造成对{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}客户名誉或经济上的损失，我们将追究会员的责任。</p>
            <p>5．5 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员不可擅自修改来自{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}，或来自{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}提供服务的第三方网站、公司，或来自与{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}有合作关系的第三方的源代码；未经{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}同意，也不得将此源代码提供给其它任何第三方使用、参考等。否则，由此产生任何第三方向{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}的追偿、索赔，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}有权向{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员追偿。{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}有权对联盟代码及代码展现形式进行自主调整，此调整不以通知联盟会员为必要。</p>
            <p>5．6 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员有义务根据{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}，或向{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}提供服务的第三方网站、公司，或与{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}有合作关系的第三方对{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}服务的内容、文本、图像等的修改、补充、删减、更新等，在其网站上对相应的服务做出变更，以保证内容的及时性、准确性、完整性。</p>
            <p>5．7 未经用户同意，采取诱导、误导等行为的推广行为，一旦发现或被举报，将立刻停止广告位终止合作，拒付余款，公司保留追究法律责任的权利，请各位会员自律。</p>
            <h3>六、违约责任</h3>
            <p>6．1 如在{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员网站中发现有违规的内容，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}将暂停或终止与{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员的合作。并停止支付相关费用和/或追回已支付的全部分成费用。</p>
            <p>6．2 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员及其关联公司的违规行为，造成对{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}及{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}客户造成负面影响的，或者有可能侵犯{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}、{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}客户合法权益及{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}用户体验的，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}可暂停或终止{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员的账户，并停止支付相关费用和/或追回已支付的全部分成费用。情节严重，移交司法机关处理。</p>
            <p>6．3 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员承诺其向{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}提交的任何资料，包括但不限于其注册信息、网页地址，联系方式等的真实性。一旦{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}发现{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员提供虚假信息或采取其它欺骗手段，有权暂停或终止{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员的帐户，并保留追究{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员责任的权利。</p>
            <p>6．4 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员若违反本注册协议，则{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}保留进一步追究责任的权利，违约的{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}会员必须承担因此给{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}带来的所有损失。</p>
            <h3>七、协议终止</h3>
            <p>7．1 会员可随时申请退出{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}。</p>
            <p>7．2 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}保留随时变更、中断或终止{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}服务。会员接受{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}行使变更、中断或终止服务的权利，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}不需对用户或第三方负责。</p>
            <p>7．3 在以下任一情况下，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}可单方面中止合作：</p>
            <p class="ti_2">（1）一旦发现加盟会员将推广内容代码放置在任何违反法律法规或{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}政策的页面上，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}有权无需通知立即单方终止与该会员合作，并终止该会员的会员资格。同时{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}有权停止支付相关费用并追回已支付的全部分成费用，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}还将要求会员赔偿{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}及其关联公司的全部损失；</p>
            <p class="ti_2">（2）如果发现加盟会员有一种或者多种违规行为或作弊行为或其它非法行为，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}有权无需通知立即关闭该会员的账号并终止与该会员的合作，同时停止支付相关费用并追回已支付的全部分成费用。</p>
            <h3>八、保密条款</h3>
            <p>8．1 会员对于因签署或履行本注册协议而了解或接触到的{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}及其关联公司的商业秘密及其他机密资料和信息（以下简称“保密信息”）均应保守秘密；非经{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}书面同意，会员不得向第三方泄露、出示、提供或转让该等保密信息。</p>
            <p>8．2 本注册协议终止后，会员也不得向任何第三方泄露、出示、提供或转让{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}保密信息。未经{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}书面许可，会员不得将{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}及其关联公司的品牌和标识用于自己的商业目的。</p>
            <p>8．3 在本注册协议终止后会员应按照{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}的要求，将载有保密信息的所有文件、资料或软件归还{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}，或予以销毁，或进行其他处置，并且不得以任何方式继续使用这些保密信息。</p>
            <p>8．4 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}一般不会公开、编辑或透露会员的注册资料或保存在{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}服务中的非公开内容，除非{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}在诚信的基础上认为透露这些信息在以下几种情况是必要的：</p>
            <p class="ti_2">（1）遵守有关法律规定，包括在国家有关机关查询时，提供会员的相关注册信息、通过{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}发布的信息及其发布时间、互联网地址或者域名等；</p>
            <p class="ti_2">（2）遵从{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}的服务程序；</p>
            <p class="ti_2">（3）保持维护{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}及其关联公司的商标等知识产权；</p>
            <p class="ti_2">（4）在紧急情况下竭力维护社会大众的隐私安全；</p>
            <p class="ti_2">（5）{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}认为必要的其他情况下；</p>
            <p>8．5 本条款并不因本协议的解除、终止、撤销、无效等任何效力瑕疵或不具操作性而失效，对本协议双方仍有约束力。任一方违反本款约定，守约方有权要求违约方支付本合同金额百分之三十的违约金，实际损失超出部分，违约方仍应予以承担。</p>
            <h3>九、所有权、知识产权以及其他权利归属</h3>
            <p>9．1 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}上所有资料（包括但不限于：文字、软件、声音、相片、录象、图表等），其著作权、专利权、商标专用权及其它知识产权，均为{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}或其他相关权利人所有，除非事先经{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}相关权利人的合法授权，会员皆不得擅自以任何形式使用。</p>
            <p>9．2 在会员使用{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}过程中产生并储存于{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}或其关联公司服务器中的任何数据信息归{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}或其关联公司所有（包括但不限于帐户数据信息、用户登录数据、参与交易留下的所有数据等，但用户的姓名、身份证号、公司名称等个人或公司专属信息除外）。</p>
            <p>9．3 会员同意{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}为履行本注册协议的需要而使用其、名称、商标或标识，或为宣传{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}或其关联公司产品和服务的目的而援引会员推广信息内容作为范例以及标明会员名称和商标。</p>
            <h3>十、其他</h3>
            <p>10．1 对于{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}涉及的政策、费用、流程等，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}有权不时通过网页公示或其它形式作为本注册协议的调整和补充，若会员在{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}进行上述调整和补充后，仍继续使用{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}服务的，则视为接受该等调整和补充，若会员不同意，可随时申请退出。</p>
            <p>10．2 双方理解并同意，双方均为独立缔约人，本注册协议不包含任何可能理解成为双方之间设立一种代理或合伙关系的内容。</p>
            <p>10．3 对本注册协议下的服务不提供包括但不限于适销性、适用性、可靠性、准确性、完整性、无病毒以及无错误的任何明示或默示保证。双方确认，{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}因本注册协议所承担的赔偿费用最高不超过由于{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}过错而受影响的会员提出赔偿之日前一个结算周期内的分成费用。</p>
            <p>10．4 本注册协议受中华人民共和国法律的约束并依据其解释。如出现纠纷，双方一致同意将纠纷交由珠海市香洲区人民法院仲裁解决。</p>
            <p>10．5 {{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}所有发给会员的通知可通过重要页面的公告或电子邮件或常规的信件传送。同时，会员在此授权{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}可以向其电子邮箱发送商业信息。</p>
            <p>10．6 若会员发展下属会员网站（下属会员网站指由会员发展，在会员网站上注册并存放{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}代码的网站），则其下属会员网站也受到本注册协议的约束，其下属会员网站对本注册协议的任何违反应被视为对本注册协议的重大违约，并且会员应就其下属会员网站的所有该等违约对{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}负责，如同该等违约是会员违约一样。</p>
            <p>10．7 本协议内容如有更改或出台细则，将在{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}网站通过公告等方式将更改内容或细则告知各位用户，请用户密切关注相关公告。</p>
            <p>10．8 如您对本注册协议内容有任何疑问，可与{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}客服联系。</p>
            <p>声明：{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}}移动平台隶属珠海宣传易传媒网络科技有限公司所有！</p>
        </div>
        <div class="cp">
            <p class="right">{{isset($commonSetting['website_name'])?$commonSetting['website_name']:''}} 2018年</p>
        </div>
    </div>
</div>
<script>
    $('.header-menu li').removeClass('active');
    $('.menu li').removeClass('active');
</script>
@endsection