    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <img src="../../../MiniMart//assets/pic/logo_footer.png" alt="logo">
                    <p class="footer__text">
                        Siêu thị MiniMart cung cấp các mặt hàng siêu sạch đem lại sức khỏe cho bạn
                    </p>
                    <p class="footer__link"><i class="fa-solid fa-location-dot"></i> Đông Anh, Hà Nội</p>
                    <a href="tel: 0975846466" class="footer__link">
                        <i class="fa-solid fa-mobile"></i> 0975846466
                    </a>
                    <a href="mailto: lehuyhung2909@gmail.com" class="footer__link">
                        <i class="fa-solid fa-envelope"></i> lehuyhung2909@gmail.com
                    </a>
                </div>
                <div class="col-3">
                    <ul class="footer__list">
                        <h3 class="footer__list__title">Tài khoản</h3>
                        <li class="footer__item">
                            <a href="./index.php">Trang chủ</a>
                        </li>
                        <li class="footer__item">
                            <a href="./products.php">Sản phẩm</a>
                        </li>
                        <li class="footer__item">
                            <a href="./feedback.php">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="col-3">
                    <ul class="footer__list">
                        <h3 class="footer__list__title">Hỗ trợ khách hàng</h3>
                        <li class="footer__item">
                            <a href="./index.php">Trang chủ</a>
                        </li>
                        <li class="footer__item">
                            <a href="./products.php">Sản phẩm</a>
                        </li>
                        <li class="footer__item">
                            <a href="./feedback.php">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="col-3">
                    <div class="footer__mail">
                        <div class="footer__social">
                            <h3 class="footer__social__title">Kết nối</h3>
                            <div class="footer__social__list">
                                <p class="footer__social__item"><i class="fab fa-google-plus-g"></i></p>
                                <p class="footer__social__item"><i class="fab fa-twitter"></i></p>
                                <p class="footer__social__item"><i class="fab fa-facebook-f"></i></p>
                                <p class="footer__social__item"><i class="fab fa-linkedin-in"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center py-4">
                <a href="https://template-minimart.mysapo.net/" target="_blank" class="footer__text">© Bản quyền thuộc
                    về <span>nhóm 11</span> | Template cung cấp bởi
                    <span>Sapo</span>
                </a>
                <button class="btn btn-outline-primary footer__btn">Lên đầu trang
                    <i class="fa-solid fa-arrow-up"></i>
                </button>
            </div>
        </div>
    </div>
    <?php
include './btn_top.php';
?>
    </div>
    </div>
    <script>
const btn = document.querySelector(".footer__btn");

btn.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo(0, 0);
})
    </script>
    </body>

    </html>