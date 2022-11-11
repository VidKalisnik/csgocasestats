$(document).ready(function(){
    $('.clickable-row').click(function(){
        var caseId = this.id;
        var case1 = $('#'+caseId +'.clickable-row .caseName').text();

        $(".replace").load("./phps/caseInfo.php", {
            caseName: case1,
        });
    });
}); 