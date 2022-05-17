<p class="btn-top">
    <i class="fa-solid fa-chevron-up"></i>
</p>


<script>
const btn = document.querySelector('.btn-top');

function scrollFunction() {
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        btn.style.display = "flex";
    } else {
        btn.style.display = "none";
    }
}

window.onscroll = function() {
    scrollFunction()
};

btn.addEventListener("click", () => {
    window.scrollTo(0, 0);
})
</script>
