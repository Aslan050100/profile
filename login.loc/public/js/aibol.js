var elementsArray = document.querySelectorAll('.card');
elementsArray.forEach(function(elem) {
    elem.addEventListener("click", function(e) {
        var name = this.querySelector('.name').innerHTML;
        var src = this.querySelector('.photo').querySelector('img').src;
        var price = this.querySelector('.price').innerHTML;
        var inf = document.getElementById("info");
        if(document.querySelector('#info').classList.contains("close")){
            document.querySelector('#info').classList.remove("close");
            document.querySelector('#info').classList.add("open");
            document.querySelector('.content').classList.remove("contentWhenClosed");
            document.querySelector('.content').classList.add("contentWhenOpened");
        }else {
            document.querySelector('#info').classList.remove("open");
            document.querySelector('#info').classList.add("close");
            document.querySelector('.content').classList.remove("contentWhenOpened");
            document.querySelector('.content').classList.add("contentWhenClosed");
        }
        console.log(info);
        info.querySelector('.hoverme').querySelector('img').src = src;
        info.querySelector('.infoContent').querySelector('.name_info').innerHTML = name;
        info.querySelector('.infoContent').querySelector('.price_info').innerHTML = price;
    });
});
