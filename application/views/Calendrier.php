<main id="main" class="main">
<h1>Calendrier</h1>
<script src='<?php echo base_url("assets/vendor/fullcalendar-6.1.15/dist/index.global.min.js") ?>' ></script>
<script src='<?php echo base_url("assets/vendor/fullcalendar-6.1.15/dist/index.global.js") ?>' ></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
        events=<?php echo $services ?>;
        res=[];
        events.forEach((event)=>{
          res.push({
            title:'Client '+event.Id_Client,
            start:event.dateHdebut
          })
        })
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          
          initialView: 'dayGridMonth',
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          //événements à afficher dans le calendrier
          events:res,
          dateClick: function(info) {
            var dt=info.dateStr
            window.location.href="<?php echo site_url("rdv/formRdv/")?>"+dt
            
          }
        });
        calendar.render();
      })

</script>
<div id='calendar'></div>
</main>