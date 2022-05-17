<div class="navbar--admin">
    <ul class="navbar--admin__list">
        <li class="navbar--admin__item">
            <div class="navbar--admin__item--wrap">
                <p class="navbar--admin__item__title">
                    <i class="fas fa-clipboard"></i> Quản lý đơn hàng
                </p>
                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
            </div>

            <ul class="navbar--admin__subnav">
                <li class="navbar--admin__subitem">
                    <a href="./../order/" class="navbar--admin__sublink">
                        Tất cả đơn hàng
                    </a>
                </li>
                <li class="navbar--admin__subitem">
                    <a href="./../order/?status=1" class="navbar--admin__sublink">
                        Đang giao
                    </a>
                </li>
                <li class="navbar--admin__subitem">
                    <a href="./../order/?status=2" class="navbar--admin__sublink">
                        Đã giao
                    </a>
                </li>
            </ul>
        </li>
        <li class="navbar--admin__item">
            <div class="navbar--admin__item--wrap">
                <p class="navbar--admin__item__title">
                    <i class="fas fa-box"></i> Quản lý sản phẩm
                </p>
                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
            </div>

            <ul class="navbar--admin__subnav">
                <li class="navbar--admin__subitem">
                    <a href="./../product/" class="navbar--admin__sublink">
                        Tất cả sản phẩm
                    </a>
                </li>
                <li class="navbar--admin__subitem">
                    <a href="./../product/add" class="navbar--admin__sublink">
                        Thêm sản phẩm
                    </a>
                </li>
            </ul>
        </li>
        <li class="navbar--admin__item">
            <div class="navbar--admin__item--wrap">
                <p class="navbar--admin__item__title">
                    <i class="fab fa-megaport"></i> Quản lý phản hồi
                </p>
                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
            </div>

            <ul class="navbar--admin__subnav">
                <li class="navbar--admin__subitem">
                    <a href="./../feedback/" class="navbar--admin__sublink">
                        Tất cả phản hồi
                    </a>
                </li>
            </ul>
        </li>
        <li class="navbar--admin__item">
            <div class="navbar--admin__item--wrap">
                <p class="navbar--admin__item__title">
                    <i class="fas fa-thumbtack"></i> Quản lý danh mục
                </p>
                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
            </div>

            <ul class="navbar--admin__subnav">
                <li class="navbar--admin__subitem">
                    <a href="./../category/" class="navbar--admin__sublink">
                        Tất cả danh mục
                    </a>
                </li>
                <li class="navbar--admin__subitem">
                    <a href="./../category/add" class="navbar--admin__sublink">
                        Thêm danh mục
                    </a>
                </li>
            </ul>
        </li>
        <li class="navbar--admin__item">
            <div class="navbar--admin__item--wrap">
                <p class="navbar--admin__item__title">
                    <i class="fas fa-user-cog"></i> Quản lý tài khoản
                </p>
                <i class="fas fa-chevron-down navbar--admin__item__icon"></i>
            </div>

            <ul class="navbar--admin__subnav">
                <li class="navbar--admin__subitem">
                    <a href="./../user/" class="navbar--admin__sublink">
                        Tài khoản
                    </a>
                </li>
                <li class="navbar--admin__subitem">
                    <a href="./../user/password.php" class="navbar--admin__sublink">
                        Mật khẩu
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>

<script>
const items = document.querySelectorAll(".navbar--admin__item--wrap");
const subnav = document.querySelectorAll(".navbar--admin__subnav");
const icons = document.querySelectorAll(".navbar--admin__item__icon");

items.forEach((item, index) => {
    item.addEventListener("click", () => {
        subnav[index].classList.toggle("active");
        icons[index].classList.toggle("active");
    });
});
</script>