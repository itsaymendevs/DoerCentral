
// 1: report expand
$('.expand--paragraph').click(function() {
    
    console.log('3');
    // 1.1: id - table
    let id = $(this).attr('data-id');
    let table = $(this).attr('data-table');
    
    
    // 1.2: toggle expand
    $(this).find('i').toggleClass('fa-eye fa-eye-slash');
    
    $(this).toggleClass('truncate-text-4l')
}); 