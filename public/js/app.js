
const x = document.getElementsByClassName("menu-item");

for (let i = 0; i < x.length; i++) {
    x[i].onclick = function() {
        console.log(1);
        this.classList.add('menu-active')
    };
}