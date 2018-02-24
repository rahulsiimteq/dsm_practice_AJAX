<ul>
    <li><input type="checkbox" id="select_all"/> Selecct All</li>
    <li><input class="checkbox" type="checkbox" name="check[]"> This is Item 1</li>
    <li><input class="checkbox" type="checkbox" name="check[]"> This is Item 2</li>
    <li><input class="checkbox" type="checkbox" name="check[]"> This is Item 3</li>
    <li><input class="checkbox" type="checkbox" name="check[]"> This is Item 4</li>
    <li><input class="checkbox" type="checkbox" name="check[]"> This is Item 5</li>
    <li><input class="checkbox" type="checkbox" name="check[]"> This is Item 6</li>
</ul>
<script type="text/javascript">


var select_all = document.getElementById("select_all"); //select all checkbox
var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items

//select all checkboxes
select_all.addEventListener("change", function(e){
    for (i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = select_all.checked;
    }
});


for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener('change', function(e){ //".checkbox" change
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){
            select_all.checked = false;
        }
        //check "select all" if all checkbox items are checked
        if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
            select_all.checked = true;
        }
    });
}
</script>
