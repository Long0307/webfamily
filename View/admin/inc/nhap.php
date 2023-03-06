
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
                <div style="overflow-y: auto;height:115%;">
                    <?php $currentPageUrl = $_SERVER["REQUEST_URI"]; ?>
                    <li class="<?php if((trim($currentPageUrl) == '/webfamily/admin/dashboard/')){ echo 'active'; }; ?>">
                        <a href="../../admin/dashboard/">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
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
    <!-- #END# Right Sidebar -->
</section>