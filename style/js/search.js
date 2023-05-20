function Search(value, key) {
    if(value == "") 
    {
        $("#search-table").load(window.location.href + " #search-table > *");
        document.getElementById("page_num").style.display = "";
    }
    else {
        $.post("../../xuly/search.php", {SearchInput: value, Key: key}, function(returndata){
            document.getElementById("search-table").innerHTML = returndata;
            document.getElementById("page_num").style.display = "none";
        })
    }
}

function Reload() {
    $("#search-table").load(window.location.href + " #search-table > *");
}