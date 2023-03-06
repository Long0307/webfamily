
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="../../public/logo/<?php echo $_SESSION['infoMember']['HinhAnh']; ?>" width="70" height="50" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['infoMember']['HoVaTen']; ?>
                </div>
                <div class="email">
                    <?php echo $_SESSION['infoMember']['Email']; ?>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <div>
                    <?php $currentPageUrl = $_SERVER["REQUEST_URI"]; ?>
                    <li class="<?php if((trim($currentPageUrl) == '/webfamily/admin/dashboard/')){ echo 'active'; }; ?>">
                        <a href="../../admin/dashboard/">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Điều hướng</span>
                        </a>
                        <ul class="ml-menu" style="margin-left:-20px;">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Header</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../admin/logo/" style="font-size:12px;">Logo</a>
                                    </li>
                                    <li>
                                        <a href="../../admin/favicon/" style="font-size:12px;">Favicon</a>
                                    </li>
                                    <li>
                                        <a href="../../admin/megamenu/" style="font-size:12px;">Mega menu - PHL.com</a>
                                    </li>
                                </ul>
                                </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Body</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../admin/slider/" style="font-size:12px;">Slide</a>
                                    </li>
                                    <li>
                                        <a href="" style="font-size:12px;">Sản phẩm nổi bật</a>
                                    </li>
                                    <li>
                                        <a href="" style="font-size:12px;">Module</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Footer</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="../../admin/informationdirectory/" style="font-size:12px;">Bài viết cuối trang</a>
                                    </li>
                                    <li>
                                        <a href="../../admin/social-networking/" style="font-size:12px;">Mạng xã hội</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/infobox/infobox-3.html" style="font-size:12px;">Địa chỉ</a>
                                    </li> 
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <?php if (getPath('index.php?controller=slider')) { ?>
                        <li class="<?php if((trim($currentPageUrl) == '/webfamily/admin/slider/')){ echo 'active'; }; ?>">
                            <a href="../../admin/slider/">
                                <i class="material-icons fas fa-dharmachakra"></i>
                                <span>Quản lý slider</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (getPath('index.php?controller=category')) { ?>
                        <li class="<?php if((trim($currentPageUrl) == '/webfamily/admin/category/')){ echo 'active'; }; ?>">
                            <a href="../../admin/category/">
                                <i class="material-icons fas fa-list-ol"></i>
                                <span>Loại sản phẩm</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (getPath('index.php?controller=product')) { ?>
                        <li class="<?php if((trim($currentPageUrl) == '/webfamily/admin/product/')){ echo 'active'; }; ?>">
                            <a href="../../admin/product/">
                                <i class="material-icons fab fa-product-hunt"></i>
                                <span>Danh sách sản phẩm</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (getPath('index.php?controller=news')) { ?>
                        <li class="<?php if((trim($currentPageUrl) == '/webfamily/admin/news/')){ echo 'active'; }; ?>">
                            <a href="../../admin/news/">
                                <i class="material-icons fas fa-newspaper"></i>
                                <span>Bài viết</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (getPath('index.php?controller=order')) { ?>
                        <li class="<?php if((trim($currentPageUrl) == '/webfamily/admin/order/')){ echo 'active'; }; ?>">
                            <a href="../../admin/order/">
                                <i class="material-icons fab fa-shopify"></i>
                                <span>Đơn hàng</span>
                            </a>
                        </li> 
                    <?php } ?>
                    <?php if (getPath('index.php?controller=productInventory')) { ?>  
                        <li class="<?php if((trim($currentPageUrl) == '/webfamily/admin/productInventory/')){ echo 'active'; }; ?>">
                            <a href="../../admin/productInventory/">
                                <i class="material-icons fas fa-warehouse"></i>
                                <span>Nhập kho sản phẩm</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if (getPath('index.php?controller=contact')) { ?>
                        <li class="<?php if((trim($currentPageUrl) == '/webfamily/admin/contact/')){ echo 'active'; }; ?>">
                            <a href="../../admin/contact/">
                                <i class="material-icons fas fa-envelope"></i>
                                <span>Liên hệ</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li class="<?php if((trim($currentPageUrl) == '/webfamily/admin/customer/')){ echo 'active'; }; ?>">
                            <a href="../../admin/customer/">
                                <i class="material-icons fas fa-envelope"></i>
                                <span>Khách hàng</span>
                            </a>
                        </li>
                    <?php if (getPath('index.php?controller=contactInfo')) { ?>
                       <li class="<?php if((trim($currentPageUrl) == '/webfamily/admin/contactInfo/')){ echo 'active'; }; ?>">
                        <a href="../../admin/contactInfo/">
                            <i class="material-icons fas fa-file-signature"></i>
                            <span>Thông tin website</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if (getPath('index.php?controller=member')) { ?>
                    <li class="<?php if((trim($currentPageUrl) == '/webfamily/admin/member/')){ echo 'active'; }; ?>">
                        <a href="../../admin/member/">
                            <i class="material-icons fas fa-users"></i>
                            <span>Cấu hình User</span>
                        </a>
                    </li>  
                <?php } ?>
            </div>
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
<!-- Right Sidebar -->
<aside id="rightsidebar" class="right-sidebar">
    <ul class="nav nav-tabs tab-nav-right" role="tablist">
        <li role="presentation" class="list active">
            <button data-toggle="tab" id="color_lens" aria-expanded="false" class="border-0 btn btn-white"><i class="material-icons">color_lens</i></button>
        </li>
        <li role="presentation" class="list">
            <button data-toggle="tab" id="add_alert" aria-expanded="true" class="border-0 btn btn-white"><i class="material-icons">add_alert</i></button>
        </li>
        <li role="presentation" class="list">
            <button data-toggle="tab" id="blur_on" aria-expanded="true" class="border-0 btn btn-white"><i class="material-icons">blur_on</i></button>
        </li>
    </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in" id="skins">
                    <div class="slimScrollDiv" style="position: relative; overflow-y: auto; width: auto; height: 125%;">
                        <ul class="demo-choose-skin" style="overflow-y: auto; width: auto; height: 142%;">
                            <li data-theme="red" class="active">
                                <div class="red"></div>
                                <span>Red</span>
                            </li>
                            <li data-theme="pink">
                                <div class="pink"></div>
                                <span>Pink</span>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                                <span>Purple</span>
                            </li>
                            <li data-theme="deep-purple">
                                <div class="deep-purple"></div>
                                <span>Deep Purple</span>
                            </li>
                            <li data-theme="indigo">
                                <div class="indigo"></div>
                                <span>Indigo</span>
                            </li>
                            <li data-theme="blue">
                                <div class="blue"></div>
                                <span>Blue</span>
                            </li>
                            <li data-theme="light-blue">
                                <div class="light-blue"></div>
                                <span>Light Blue</span>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>
                                <span>Cyan</span>
                            </li>
                            <li data-theme="teal">
                                <div class="teal"></div>
                                <span>Teal</span>
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                                <span>Green</span>
                            </li>
                            <li data-theme="light-green">
                                <div class="light-green"></div>
                                <span>Light Green</span>
                            </li>
                            <li data-theme="lime">
                                <div class="lime"></div>
                                <span>Lime</span>
                            </li>
                            <li data-theme="yellow">
                                <div class="yellow"></div>
                                <span>Yellow</span>
                            </li>
                            <li data-theme="amber">
                                <div class="amber"></div>
                                <span>Amber</span>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                                <span>Orange</span>
                            </li>
                            <li data-theme="deep-orange">
                                <div class="deep-orange"></div>
                                <span>Deep Orange</span>
                            </li>
                            <li data-theme="brown">
                                <div class="brown"></div>
                                <span>Brown</span>
                            </li>
                            <li data-theme="grey">
                                <div class="grey"></div>
                                <span>Grey</span>
                            </li>
                            <li data-theme="blue-grey">
                                <div class="blue-grey"></div>
                                <span>Blue Grey</span>
                            </li>
                            <li data-theme="black">
                                <div class="black"></div>
                                <span>Black</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="setting">
                    <div class="slimScrollDiv" style="position: relative; overflow-y: auto; width: auto; height: 125%;">
                        <div class="demo-settings" style="overflow-y: auto; width: auto; height: auto;">
                        <ul class="setting-list dropdown-menu dropdown-menu-right" style="display:block;position:absolute; top:20;width: 100%;height: 100vh;">
                            <li class="dropdown-header p-2">Đơn đặt hàng</li>
                            <li class="p-2">
                                <a href="" class="p-0 my-0">
                                    <span class="label label-warning pull-right p-2 m-2">0</span>Đang xử lý
                                </a>
                            </li>
                            <li class="p-2">
                                <a href="" class="p-0 my-0">
                                    <span class="label label-success pull-right p-2 m-2">1</span>Đơn hàng hoàn thành
                                </a></li>
                                <li class="p-2">
                                    <a href="" class="p-0 my-0">
                                        <span class="label label-danger pull-right p-2 m-2">0</span>
                                    Đổi / Trả hàng</a>
                                </li>

                                <li class="dropdown-header p-2">Khách hàng</li>
                                <li class="p-2">
                                    <a href="" class="p-0 my-0">
                                        <span class="label label-success pull-right p-2 m-2">0</span>Khách hàng đang online</a>
                                    </li>
                                    <li class="p-2">
                                        <a href="" class="p-0 my-0">
                                            <span class="label label-danger pull-right p-2 m-2">0</span>Chờ đồng ý</a>
                                        </li>

                                        <li class="dropdown-header p-2">Sản phẩm</li>
                                        <li class="p-2">
                                            <a href="" class="p-0 my-0">
                                                <span class="label label-danger pull-right p-2 m-2">0</span>Hết hàng
                                            </a>
                                        </li>
                                        <li class="p-2">
                                            <a href="" class="p-0 my-0">
                                                <span class="label label-danger pull-right p-2 m-2">2</span>Nhận xét
                                            </a>
                                        </li>

                                        <li class="dropdown-header p-2">Liên kết - Người bán hàng</li>
                                        <li class="p-2"><a href="" class="p-0 my-0"><span class="label label-danger pull-right p-2 m-2">0</span>Chờ đồng ý</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="shown">
                            <div class="slimScrollDiv" style="position: relative; overflow-y: auto; width: auto; height: 125%;">
                                <div class="demo-shown" style="overflow-y: auto; width: auto; height: auto;">
                                    <ul class="dropdown-menu dropdown-menu-right" style="display:block;position:absolute; top:20;width: 100%;height: 100vh;">
                                        <li class="dropdown-header p-2">Cửa hàng<i class="material-icons" style="font-size:15px; margin:10px 10px;">shopping_cart</i></li>
                                        <li class="px-3">    
                                            <a href="">
                                                Công ty TNHH PHL.COM
                                            </a>
                                        </li>

                                        <li class="dropdown-header px-2">Trợ giúp<i class="material-icons" style="font-size:15px; margin:10px 10px;">help_outline</i></li>
                                        <li class="px-3">    
                                            <a href="">Trang chủ</a>
                                        </li>
                                        <li class="px-3">
                                            <a href="">Diễn đàn hỗ trợ
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
                <script>
                    $("#color_lens").click(function (e) {
                        e.preventDefault();
                        $("li.list").removeClass("active");
                        $(this).parent().addClass("active");
                        $("#setting").css('display', 'none');
                        $("#shown").css('display', 'none');
                        $("#skins").addClass("in").addClass("active").addClass("in").css('display', 'block');
                    });
                    $("#add_alert").click(function (e) {
                        e.preventDefault();
                        $("li.list").removeClass("active");
                        $(this).parent().addClass("active");
                        $("#skins").css('display', 'none');
                        $("#shown").css('display', 'none');
                        $("#setting").addClass("in").addClass("active").addClass("in").css('display', 'block');
                    });
                    $("#blur_on").click(function (e) {
                        e.preventDefault();
                        $("li.list").removeClass("active");
                        $(this).parent().addClass("active");
                        $("#skins").css('display', 'none');
                        $("#setting").css('display', 'none');
                        $("#shown").addClass("in").addClass("active").addClass("in").css('display', 'block');
                    });
                </script>
            </section>  

             <li role="presentation" class="active"><a href="#skins" data-toggle="tab" id="color_lens"><i class="material-icons">color_lens</i></a></li>
        <li role="presentation"><a href="#settings" data-toggle="tab" id="add_alert"><i class="material-icons">add_alert</i></li>
            <li role="presentation"><a href="#shown" data-toggle="tab" id="blur_on"><i class="material-icons">blur_on</i></li>