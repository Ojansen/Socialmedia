function zoekVriend() {
    var input, filter, ul, li, a, i;

    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            if ($('#myInput').val().length == 0) {
                // Hide the element
                $('.li').hide();
            } else {
                // Otherwise show it
                li[i].style.display = "";
            }
        } else {
            li[i].style.display = "none";
        }
    }
}