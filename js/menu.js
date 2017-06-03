/**
 * Created by rogerslei on 2017/5/28.
 */
function check() {
  var name = document.getElementById("name").value;
  var pass = document.getElementById("pwd").value;
  if (name == "") {
    alert("用户名不能为空");
    return false;
  }
  else if (pass == "") {
    alert("密码不能为空");
    return false;
  }
  else if (pass.length < 6) {
    alert("密码长度不足");
    return false;
  }
  return true;
}

function exit() {
  location.href = "../php/logout.php";
  return false;
}

function reback() {
  location.href = "studiolist.php" ;
}

function changeSeat(studioid,row,col) {
  var crow = $('#rn').attr("placeholder");
  var ccol = $('#cn').attr("placeholder");
  var type = $('#st').val();
  var name = $('#nowname').text();

  var data = {
    'id': studioid,
    'row':row,
    'col':col,
    'type':type,
    'crow':crow,
    'ccol':ccol
  };
  var str = "seat.php?id="+studioid+"&row="+row+"&col="+col+"&crow="+crow+"&ccol="+ccol+"&type="+type+"&name="+name;
  console.log(str);
  $.get("seat.php",data,function () {
    alert("update success");
    location.href = str;
  })
}
//用户管理

$('#UpdateUser').on('show.bs.modal', function (event) {
  var a = $(event.relatedTarget);
  //可以用此方式获取该行的标识，用于修改
  var num = $.trim(a.parent().prevAll()[3].innerHTML); //从后往前
  var name = $.trim(a.parent().prevAll()[2].innerHTML);
  var pwd = $.trim(a.parent().prevAll()[1].innerHTML);
  var type = $.trim(a.parent().prevAll()[0].innerHTML);
  modal = $(this);
  modal.find("#unum").val(num);
  modal.find("#un").val(name);
  modal.find("#up").val(pwd);
  modal.find("#ut").val(type);
});

function updateUser() {
  var num = $("#unum").val();
  var name = $("#un").val();
  var pwd = $("#up").val();
  var type = $("#ut").val();
  var operation = "update";
  //console.log(num+name+pwd+type);
  var data = {
    'usernum': num,
    'username': name,
    'userpassword': pwd,
    'usertype': type,
    'operation': operation
  };
  $.post("user.php", data, function () {
    alert("update success");
    location.href = "userlist.php";
  });
}

function addUser() {
  var name = $("#un").val();
  var pwd = $("#up").val();
  var type = $("#ut").val();
  var operation = "add";
  var iframe = document.getElementById("iframe");
  var status = name != "" && name != null && pwd != "" && pwd != null && type != "" && type != null;
  if (status) {
    var data = {
      'username': name,
      'userpassword': pwd,
      'usertype': type,
      'operation': operation
    };
    $.post("m/user.php", data, function () {
      alert("Insert success");
      iframe.src = "m/userlist.php"
    });
  }
  else {
    alert("please input information");
  }
}

function delUser(e) {
  var a = $(e);
  var usernum = $.trim(a.parent().prevAll()[3].innerHTML);
  var operation = "del";
  //console.log(usernum);

  var data = {
    'usernum': usernum,
    'operation': operation
  };
  $.post("user.php", data, function () {
    alert("Del success");
    location.href = "userlist.php";
  });
}

//影片管理

$('#UpdateFilm').on('show.bs.modal', function (event) {
  var a = $(event.relatedTarget);
  console.log(a);
  //可以用此方式获取该行的标识，用于修改
  var num = $.trim(a.parent().prevAll()[4].innerHTML); //从后往前
  var name = $.trim(a.parent().prevAll()[3].innerHTML);
  var time = $.trim(a.parent().prevAll()[1].innerHTML);
  var type = $.trim(a.parent().prevAll()[2].innerHTML);
  var price = $.trim(a.parent().prevAll()[0].innerHTML);
  //console.log(num);
  modal = $(this);
  modal.find("#fnum").val(num);
  modal.find("#fn").val(name);
  modal.find("#fty").val(type);
  modal.find("#ftm").val(time);
  modal.find("#fp").val(price);
});

function addFilm() {
  //var filmnum = $("#fnum").val();
  var filmname = $("#fn").val();
  var filmtype = $("#fty").val();
  var filmtime = $("#ftm").val();
  var filmprice = $("#fp").val();
  var iframe = document.getElementById("iframe");
  var operation = "add";
  var status = filmname != "" && filmname != null && filmtype != "" && filmtype != null && filmtime != "" && filmtime != null && filmprice != "" && filmprice != null;
  if (status) {
    var data = {
      'filmname': filmname,
      'filmtype': filmtype,
      'filmtime': filmtime,
      'filmprice': filmprice,
      'operation': operation
    };
    $.post("m/film.php", data, function () {
      alert("Insert success");
      iframe.src = "m/Filmlist.php";
    });
  }
  else {
    alert("please input information");
  }
}

function updateFilm() {
  var filmnum = $("#fnum").val();
  var filmname = $("#fn").val();
  var filmtype = $("#fty").val();
  var filmtime = $("#ftm").val();
  var filmprice = $("#fp").val();
  var operation = "update";
  //console.log(num+name+pwd+type);
  var data = {
    'filmnum': filmnum,
    'filmname': filmname,
    'filmtype': filmtype,
    'filmtime': filmtime,
    'filmprice': filmprice,
    'operation': operation
  };
  $.post("film.php", data, function () {
    alert("update success");
    location.href = "filmlist.php";
  });
}

function delFilm(e) {
  var a = $(e);
  var filmnum = $.trim(a.parent().prevAll()[4].innerHTML);
  var operation = "del";
  //console.log(filmnum);

  var data = {
    'filmnum': filmnum,
    'operation': operation
  };
  $.post("film.php", data, function () {
    alert("Del success");
    location.href = "filmlist.php";
  });
}

//影厅管理
$('#UpdateStudio').on('show.bs.modal', function (event) {
  var a = $(event.relatedTarget);
  //可以用此方式获取该行的标识，用于修改
  var num = $.trim(a.parent().prevAll()[4].innerHTML); //从后往前
  var name = $.trim(a.parent().prevAll()[3].innerHTML);
  var row = $.trim(a.parent().prevAll()[2].innerHTML);
  var col = $.trim(a.parent().prevAll()[1].innerHTML);
  modal = $(this);
  modal.find("#stnum").val(num);
  modal.find("#stn").val(name);
  modal.find("#str").val(row);
  modal.find("#stc").val(col);
});

function updateStudio() {
  var num = $("#stnum").val();
  var name = $("#stn").val();
  var row = $("#str").val();
  var col = $("#stc").val();
  var operation = "update";
  //console.log(name);
  var data = {
    'studionum': num,
    'studioname': name,
    'studiorow': row,
    'studiocol': col,
    'operation': operation
  };
  $.post("studio.php", data, function () {
    alert("update success");
    location.href = "studiolist.php";
  });
}

function addStudio() {
  var name = $("#stn").val();
  var row = $("#str").val();
  var col = $("#stc").val();
  var operation = "add";
  var iframe = document.getElementById("iframe");
  var status = name != "" && name != null && row != "" && row != null && col != "" && col != null;
  if (status) {
    var data = {
      'studioname': name,
      'studiorow': row,
      'studiocol': col,
      'operation': operation
    };
    $.post("m/studio.php", data, function () {
      alert("Insert success");
      iframe.src = "m/studiolist.php";
    });
  }
  else {
    alert("please input information");
  }
}

function delStudio(e) {
  var a = $(e);
  var studionum = $.trim(a.parent().prevAll()[4].innerHTML);
  var operation = "del";
  //console.log(studionum);

  var data = {
    'studionum':studionum,
    'operation': operation
  };
  $.post("studio.php", data, function () {
    alert("Del success");
    location.href = "studiolist.php";
  });
}

//计划管理
$('#UpdateSchedule').on('show.bs.modal', function (event) {
  var a = $(event.relatedTarget);
  //可以用此方式获取该行的标识，用于修改
  var schnum = $.trim(a.parent().prevAll()[4].innerHTML); //从后往前
  var movnum = $.trim(a.parent().prevAll()[3].innerHTML);
  var stunum = $.trim(a.parent().prevAll()[2].innerHTML);
  var startt = $.trim(a.parent().prevAll()[1].innerHTML);
  var endt = $.trim(a.parent().prevAll()[0].innerHTML);
  var s = formatIn(startt);
  var e = formatIn(endt);
  modal = $(this);
  modal.find("#schnum").val(schnum);
  modal.find("#movnum").val(movnum);
  modal.find("#stunum").val(stunum);
  modal.find("#startt").val(s);
  modal.find("#endt").val(e);
});

function updateSchedule() {
  var schnum = $("#schnum").val();
  var movnum = $("#movnum").val();
  var stunum = $("#stunum").val();
  var startt = $("#startt").val();
  var endt = $("#endt").val();
  var operation = "update";
  //console.log(startt);
  startt = formatOut(startt);
  endt = formatOut(endt);
  var data = {
    "schnum":schnum,
    "movnum":movnum,
    "stunum":stunum,
    "startt":startt,
    "endt":endt,
    "operation":operation
  };
  $.post("schedule.php",data,function () {

  });
}

function delSchedule(e) {
  var a = $(e);
  var schedulenum = $.trim(a.parent().prevAll()[4].innerHTML);
  var operation = "del";
  console.log(schedulenum);
  var data = {
    'schedulenum':schedulenum,
    'operation': operation
  };
  $.post("schedule.php",data,function (e) {
    if(e == "error"){
      alert("delete error");
    }
    else if(e == "success")
      alert("delete success");
      location.href = "schedulelist.php";
  });
}

function addSchedule() {
  var movnum = $("#movnum").val();
  var stunum = $("#stunum").val();
  var startt = $("#startt").val();
  var endt = $("#endt").val();
  var operation = "add";
  var s = formatOut(startt);
  var e = formatOut(endt);
  //console.log(e);
  var iframe = document.getElementById("iframe");
  var status = movnum!=""&&movnum!=null && stunum!=""&&stunum!=null && startt!=""&&startt!=null && endt!=""&&endt!=null;
  if(status) {
    var data = {
      "movnum": movnum,
      "stunum": stunum,
      "startt": s,
      "endt": e,
      "operation": operation
    };
    $.post("m/schedule.php", data, function (e) {
        if(e=="error"){
          alert("movie or studio not defined");
        }
        else if(e=="success"){
          alert("Insert success");
          iframe.src = "m/schedulelist.php";
        }
    });
  }
  else
    alert("please input information");
}

//时间格式处理
function formatIn(time) {
  var ymd = time.split(' ')[0];
  var hms = time.split(' ')[1];
  var nymd = ymd.replace(/\//g,"-");
  var nhms = hms.replace(/\//g,":");
  var ntime = "";
  if(isChrome()){
    ntime = nymd+"T"+nhms;
    //console.log(ntime);
  }
  else {
    ntime = nymd + " " + nhms;
    //console.log(ntime);
  }
  return ntime;
}

function formatOut(time) {

  if(isChrome()){
    time = time.replace(/T/g,' ');
  }

  return time;
}
//判断浏览器
function isChrome() {
  var userAgent = navigator.userAgent;
  if(userAgent.indexOf("Chrome")>-1){
    return true;
  }
  return false;
}