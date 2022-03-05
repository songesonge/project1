  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var dt = new Date();
    var dYear = dt.getFullYear();
    var dMonth = dt.getMonth()+1;
    var dDay = dt.getDate();
    var dDate = dYear+'-'+dMonth+'-'+dDay;

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prevYear,prev,next,nextYear today',
        center: 'title',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      },
      initialDate: dDate,
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      events: [
        {
            title: '연극-모든 건 타이밍',
            start: '2021-12-10',
            end: '2021-12-25'
        },
        {
          title: '뮤지컬 마포종점',
          start: '2021-12-24',
          end: '2021-12-26'
        },
        {
          groupId: 999,
          title: 'M 꿈의 무대',
          start: '2021-12-09T16:00:00'
        },
        {
          groupId: 999,
          title: '마포M M 클래식 축제',
          start: '2021-12-16T16:00:00'
        },
        {
          title: 'C꼬레아리듬터치#3',
          start: '2021-12-11',
          end: '2021-12-13'
        },
        {
          title: '2021 인디열전',
          start: '2021-12-12T10:30:00',
          end: '2021-12-12T12:30:00'
        },
        {
          title: '서울 탭댄스 페스티벌',
          start: '2021-12-12T12:00:00'
        },
        {
          title: '프라하 첼로 콰르텟 내한공연',
          start: '2021-12-12T14:30:00'
        },
        {
          title: 'Beethoven 250th concert',
          start: '2021-12-12T17:30:00'
        },
        {
          title: 'M 단막 극장',
          start: '2021-12-12T20:00:00'
        },
        {
          title: '마포문화재단 기획공연 라인업',
          start: '2022-12-13T07:00:00'
        },
        {
          title: '터치드 : We are touched',
          url: 'http://google.com/',
          start: '2021-12-28'
        }
      ]
    });

    calendar.render();
  });

