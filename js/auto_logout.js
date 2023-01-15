setInterval(function(){
    check_user();
},5000);
function check_user(){
    jQuery.ajax({
        url:'admin_session.php',
        type:'post',
        data:'data=time_out',
        success:function(result){
            if(result=='logout'){
                window.location.href='logout.php';
            }
        }
    });
}
