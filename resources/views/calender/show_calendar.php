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
  html, body {
    overflow: hidden;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }
  /* カレンダーのヘッダースタイル(年月がある部分) */
  .fc-header-toolbar {
    padding-top: 1em;
    padding-left: 1em;
    padding-right: 1em;
  }
  /* ドラックボックスのスタイル */

	
  #external-events {
    position: fixed;
    left: 20px;
    top: 20px;
    width: 100px;
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
  #calendar1 {
    max-width: 1100px;
    margin: 0 auto;
  }
</style>
</head>
<body style="padding:30px;">
  [<a href='/'>シングルタスク一覧</a>]
  [<a href='/projects'>プロジェクト一覧</a>]
  <!-- calendarタグ -->
  <div id='calendar-container'>
    <div id='calendar'></div>
  </div>
  <script>
  (function(){
    $(function(){
      // calendarエレメント取得
      var calendarEl = $('#calendar')[0];
      // full-calendar生成する。
      var calendar = new FullCalendar.Calendar(calendarEl, {
        height: '600px', // calendarの高さ設定
        expandRows: true, // 画面に合わせて高さを再設定
        slotMinTime: '01:00', // Dayカレンダーに開始時間
        slotMaxTime: '24:00', // Dayカレンダーに終了時間
        // ヘッダーに表示するツールバー
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        initialView: 'timeGridWeek', // 初期ロードする時、見えるカレンダーの画面(基本設定:週)
        navLinks: true, // 日付を選択するとDayカレンダーやWeekカレンダーにリンク
        editable: true, // 修正可能
        selectable: true, // カレンダーのドラッグ設定可能
        nowIndicator: true, // 現在時間マーク
        dayMaxEvents: true, // イベントの数がオバーすると高さの制限(+のマークと何個式で表現)
        locale: 'ja', // 日本語設定
        eventAdd: function(obj) { // イベントが追加すると発生するイベント
          console.log(obj);
        },
        eventChange: function(obj) { // イベントが修正されたら発生するイベント
          console.log(obj);
        },
        eventRemove: function(obj){ // イベントが削除すると発生するイベント
          console.log(obj);
        },
        select: function(arg) { // カレンダーでドラックでイベントを生成することが可能。
          var title = prompt('Event Title:');
          if (title) {
            calendar.addEvent({
              title: title,
              start: arg.start,
              end: arg.end,
              allDay: arg.allDay
            })
          }
          calendar.unselect()
        }
      });
      // カレンダーレンダリング
      calendar.render();
    });
  })();
</script>
</body>
</html>
