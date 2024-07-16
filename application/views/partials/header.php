<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Garage</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="<?php echo base_url( "assets/img/favicon.png") ?>" rel="icon">
        <link href="<?php echo base_url( "assets/img/apple-touch-icon.png") ?>" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="<?php echo base_url( "assets/vendor/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
        <link href="<?php echo base_url( "assets/vendor/bootstrap-icons/bootstrap-icons.css") ?>" rel="stylesheet">
        <link href="<?php echo base_url( "assets/vendor/boxicons/css/boxicons.min.css") ?>" rel="stylesheet">
        <link href="<?php echo base_url( "assets/vendor/quill/quill.snow.css") ?>" rel="stylesheet">
        <link href="<?php echo base_url( "assets/vendor/quill/quill.bubble.css") ?>" rel="stylesheet">
        <link href="<?php echo base_url( "assets/vendor/remixicon/remixicon.css") ?>" rel="stylesheet">
        <link href="<?php echo base_url( "assets/vendor/simple-datatables/style.css") ?>" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href= "<?php echo base_url( "assets/css/style.css") ?>" rel= "stylesheet" >
        <link href= "<?php echo base_url( "assets/css/Calendrier.css") ?>" rel= "stylesheet" >
        <script src='<?php echo base_url("assets/fullcalendar-6.1.15/dist/index.global.js") ?>' ></script>
        <script>

            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                initialDate: '2023-01-12',
                initialView: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                height: 'auto',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                selectable: true,
                selectMirror: true,
                nowIndicator: true,
                <?php  ?>
                events: [
                    
                    {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2023-01-09T16:00:00',
                    url: '<?php echo site_url(""); ?>',
                    }
                    
                ]
                });

                calendar.render();
            });

        </script>
    </head>
    <body>
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
            
                <img src="<?php echo base_url( "assets/img/logo.png") ?>" alt="">
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </a>
            <div>
                <ul>
               
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('client/disconnect') ?>">
                      <i class="bi bi-box-arrow-right"></i>
                      <span>Sign Out</span>
                    </a>
                
                </ul>
            </div>
            </div>
        </header>