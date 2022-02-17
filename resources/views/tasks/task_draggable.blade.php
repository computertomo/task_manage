<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <!-- 画面解像度により文字サイズを対応(モバイル対応) -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <!-- jquery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- fullcalendar CDN -->
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css' rel='stylesheet' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js'></script>
  <!-- fullcalendar 言語 CDN -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/locales-all.min.js'></script>
<style>
  /* bodyスタイル */
  body {
    margin-top: 40px;
    font-size: 14px;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  }
  .secect_box{
    display:flex;
    align-items :center;
    justify-content: center;
  }
  .fc-body{
    font-size:15px;
  }
  /* ドラックボックスのスタイル */
  #external-events {
    position: fixed;
    left: 20px;
    top: 70px;
    width: 140px;
    padding: 0 10px;
    border: 1px solid #ccc;
    background: #eee;
    text-align: left;
  }
  /* ドラックボックスのスタイルのタイトル */
  #external-events h4 {
    font-size: 16px;
    margin-top: 0;
    padding-top: 1em;
  }
  #external-events .fc-event {
    margin: 3px 0;
    cursor: move;
  }
 
  #external-events p {
    margin: 1.5em 0;
    font-size: 11px;
    color: #666;
  }
 
  #external-events p input {
    margin: 0;
    vertical-align: middle;
  }
 
  #calendar-wrap {
    margin-left: 200px;
  }
 
  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }
</style>
</head>
<body>
  <div class="secect_box">
    <h1>タスク一覧</h1>
    [<a href='/projects'>プロジェクト一覧</a>]
    [<a href='/calendar'>カレンダーへ</a>]
  </div>
  <div id='wrap'>
    <!-- ドラックボックス -->
    <div id='external-events'>
      [<a href='/tasks/create'>タスクを作成する</a>]
      <h4>タスク一覧</h4>
      <div id='external-events-list'>
      </div>
    </div>
    <!-- calendarタグ -->
    <div id='calendar-wrap'>
      <div id='calendar'></div>

    </div>
  </div>
  <script>
  (function(){
    $(function(){
      <!--ドラックボックスのエレメントを取得-->
      var containerEl = $('#external-events-list')[0];
      <!--ドラックボックスを生成する。-->
      new FullCalendar.Draggable(containerEl, {
        itemSelector: '.fc-event',
        expandRows:true,
        eventData: function(eventEl) {
          return {
            title: eventEl.innerText.trim()
          }
        }
      });
      <!--ドラックイベントを追加-->
      $.ajax({
        type: "get",　
        url:'/tasks/contents',
        dataType: "json"
      })
      .done((res) => {
        $.each(res, function(i,value){
          html =`
              <a class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                <div class='fc-event-main'>
                    <div class='fc-body'>
                       ${value.body}
                    </div>
                </div>
              </a>
            `;
            $('#external-events-list').append(html);
        })
      });
      // calendarエレメント取得
      var calendarEl = $('#calendar')[0];
      // full-calendar生成する。
      var calendar = new FullCalendar.Calendar(calendarEl, {
        // ヘッダーに表示するツールバー
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        initialView: 'timeGridWeek',
        locale: 'ja', // 日本語設定
        events: "/setEvents",
        editable: true, // 修正可能
        droppable: true,  // ドラック可能
        drop: function(arg) { // ドラッグアンドドロップが成功する場合
          // ドラックボックスでイベントを削除する。
          arg.draggedEl.parentNode.removeChild(arg.draggedEl);
        }
        
        
        
      });
      <!--ここまでが第二引数（プラグイン：カレンダーの機能）-->
      // カレンダーレンダリング
      calendar.render();
    });
  })();
</script>
</body>
</html>


<!--function addEvent(calendar,info){-->

<!--    // タイトルの値を受け取る処理は、説明を簡潔にするために割愛し、適当な値を与えておきます-->
<!--    var title = "サンプルイベント";-->

<!--    $.ajax({-->
<!--        url: '/ajax/addEvent',-->
<!--        type: 'POST',-->
<!--        dataTape: 'json',-->
<!--        data:{-->
<!--            "title":title,-->
<!--            // 日程取得-->
<!--            "date":info.dateStr-->

<!--        }-->
<!--    }).done(function(result) {-->
<!--        // Ajaxに成功したらフロント側にeventを追加で表示-->
<!--        calendar.addEvent({-->
<!--            // PHP側から受け取ったevent_idをeventObjectのidにセット-->
<!--            id:result['event_id'],-->
<!--            title:title,-->
<!--            start: info.dateStr,-->
<!--        });-->
<!--    });-->
<!--}-->

<!--function editEventDate(info){-->
<!--    var event_id = info.event.id;-->
<!--    //ドロップしたあとの日付-->
<!--    var date = formatDate(info.event.start);-->

<!--    $.ajax({-->
<!--        url: '/ajax/editEventDate',-->
<!--        type: 'POST',-->
<!--        data:{-->
<!--            "id":event_id,-->
<!--            "newDate":date-->
<!--        }-->
<!--    })-->
<!--}-->

<!--function formatDate(date) {-->
<!--    var year = date.getFullYear();-->
<!--    var month = date.getMonth() + 1;-->
<!--    var day = date.getDate();-->
<!--    var newDate = year + '-' + month + '-' + day;-->
<!--    return newDate;-->
<!--}-->