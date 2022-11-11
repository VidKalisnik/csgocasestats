$(document).ready(function(){
        $('.case1').click(function(){
            var case1 = $('.case1 .case-name').text();
            $(".replace").load("./phps/caseInfo.php", {
                caseName: case1,
            });
        });

        $('.case2').click(function(){
            var case1 = $('.case2 .case-name').text();
            $(".replace").load("./phps/caseInfo.php", {
                caseName: case1,
            });
        });

        $('.case3').click(function(){
            var case1 = $('.case3 .case-name').text();
            $(".replace").load("./phps/caseInfo.php", {
                caseName: case1,
            });
        });

        $('.random').click(function(){
            var case1 = $('.random .case-name').text();
            $(".replace").load("./phps/caseInfo.php", {
                caseName: case1,
            });
        });
}); 

