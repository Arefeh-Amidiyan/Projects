$(document).ready(function () {
    //======================
    var idCalendar = null;
    var id = null;
    var spantimestart = null;
    var spantimefinish = null;
    var spandate = null;
    var spancommnet = null;
    var spansubject = null;
    //======================
    $(document).on('click', '.day', function (e) {
        if ($(this)[0].hasAttribute("id")) {
            $(".day").removeClass('select');
            $(this).addClass('select');
            idCalendar = $(this).attr('id');
            $("#calendarId").val(idCalendar);
        }
    });
    //ثبت
    $("#send").click(function () {
        var subject = $("#subject").val();
        var calendarId = $("#calendarId").val();
        var timeStart = $("#timeStart").val();
        var timeFinish = $("#timeFinish").val();
        var comment = $("#comment").val();
        $.ajax({
            url: "ajax.php",
            method: "POST",
            data: {
                subject: subject,
                calendarId: calendarId,
                timeStart: timeStart,
                timeFinish: timeFinish,
                comment: comment
            },
            success: function (msg) {

                $("#calendarId").val('لطفا تاریخ را از تقویم انتخاب نمایید.');
                $("#timeStart").val("");
                $("#timeFinish").val("");
                $("#subject").val("");
                $("#comment").val("");
                $("#background").fadeOut(500);
                $("#modal").fadeOut(500);
                $("#event").hide(500);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('خطا در ارسال');
            }
        });
    });
    $(document).on('click', '#calendar td span', function (e) {
        spantimestart = $(this).find("input[name='timestart']").val();
        spantimefinish = $(this).find("input[name='timefinish']").val();
        spandate = $(this).find("input[name='date']").val();
        spancommnet = $(this).find("input[name='comment']").val();
        id = $(this).find("input[name='id']").val();
        spansubject = $(this).text();
        $("#spanId").val(spandate);
        $("#spantimeStart").val(spantimestart);
        $("#spantimeFinish").val(spantimefinish);
        $("#spansubject").val(spansubject);
        $("#spancomment").val(spancommnet);
        $("#background").fadeIn(500);
        $("#modal").fadeIn(500);
        //console.log(spantimestart);
    });
    $("#spanedit").click(function () {
        $("#background").fadeOut(500);
        $("#modal").fadeOut(500);
        $("#event").hide(500);
        spantimestart = $("#spantimeStart").val();
        spantimefinish = $("#spantimeFinish").val();
        spansubject = $("#spansubject").val();
        spancommnet = $("#spancomment").val();
        $.ajax({
            url: "ajax.php",
            method: "POST",
            data: {
                id: id,
                spantimestart: spantimestart,
                spantimefinish: spantimefinish,
                spandate: spandate,
                spancommnet: spancommnet,
                spansubject: spansubject
            },
            success: function (msg) {
                $("#calendar").html(msg);
                $("#spanId").val("");
                $("#spantimeStart").val("");
                $("#spantimeFinish").val("");
                $("#spancomment").val("");
                $("#spansubject").val("");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('خطا در ارسال');
            }
        });
    });
    $("#spansend").click(function () {
        $("#background").fadeOut(500);
        $("#modal").fadeOut(500);

        $.ajax({
            url: "ajax.php",
            method: "POST",
            data: {
                id: id
            },
            success: function (msg) {
                $("#calendar").html(msg);
                $("#spanId").val("");
                $("#spantimeStart").val("");
                $("#spantimeFinish").val("");
                $("#spancomment").val("");
                $("#spansubject").val("");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('خطا در ارسال');
            }
        });
    });
    $("#background").click(function () {
        $("#background").fadeOut(500);
        $("#modal").fadeOut(500);
        $("#event").fadeOut(500);
    });
    $("#startmodal").click(function () {
        var test = $("#calendarId").val();
        if (test != 'لطفا تاریخ را از تقویم انتخاب نمایید.') {
            $("#event").show();
            $("#background").show();
        } else {
            alert(test);
        }

    });
});
