function menuFilter() {

    var input, filter, ul, li, i, txtValue;
    input = document.getElementById("search-input");
    filter = input.value.toUpperCase();
    ul = document.getElementById("menu-links");
    li = ul.getElementsByTagName("li");

    for (i = 0; i < li.length; i++) {

        txtValue = li[i].getAttribute("filter");

        if (txtValue.toUpperCase().indexOf(filter) > -1) {

            li[i].style.display = "";
            li[i].parentNode.parentNode.style.display = "";

        } else {

            li[i].style.display = "none";

        }

    }

}
