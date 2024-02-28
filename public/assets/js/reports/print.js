

// 1: print tables
$('.btn--print').click(function() {
    
    // 1.1: table - title
    let table = $(this).attr('data-print');
    
    let title = $(this).attr('data-title');
    
    
    new printJS({
        printable: table,
        type: 'html',
        header: title,
        headerStyle: 'font-weight: 600; margin-bottom: 12px; font-size: 20px;',
        scanStyles: true,
        maxWidth: '100%',
        width: '100%',
        css: [
           '../bootstrap/css/bootstrap.min.css',
           
           'https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i,800,800i&display=swap',
          
            '../css/clients.css',
            '../css/file.css',
            '../css/globals.css',
            '../css/home.css',
            '../css/navbar.css',
            '../css/login.css',
            '../css/reports.css',
            '../css/search.css',
            '../css/styles.css',
        ]
    })
});