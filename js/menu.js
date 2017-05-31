/**
 * Created by rogerslei on 2017/5/28.
 */
function check() {
  var name = document.getElementById("name").value;
  var pass = document.getElementById("pwd").value;
  if(name==""){
    alert("用户名不能为空");
    return false;
  }
  else if(pass==""){
    alert("密码不能为空");
    return false;
  }
  else if(pass.length<6){
    alert("密码长度不足");
    return false;
  }
  return true;
}

$('#UpdateUser').on('show.bs.modal', function (event){
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
  var data = {'usernum':num,'username':name,'userpassword':pwd,'usertype':type,'operation':operation};
  $.post("user.php",data,function () {
    alert("update success");
    location.href = "userlist.php?1";
  });
}

function addUser() {
  var name = $("#un").val();
  var pwd = $("#up").val();
  var type = $("#ut").val();
  var operation = "add";
  var status = name!="" && name!=null && pwd!="" && pwd!=null && type!="" && type!=null;
  if(status){
    var data = {'username':name,'userpassword':pwd,'usertype':type,'operation':operation};
    $.post("m/user.php",data,function () {
      alert("Insert success");
      location.href = "userlist.php?1";
    });
  }
  else{
    alert("please input information");
  }
}

function delUser(e) {
  var a = $(e);
  var usernum = $.trim(a.parent().prevAll()[3].innerHTML);
  var operation = "del";
  //console.log(usernum);

  var data = {'usernum':usernum,'operation':operation};
  $.post("user.php",data,function () {
    alert("Del success");
    location.href = "userlist.php?1";
  });
}

function addFilm() {
  var filmname = $("#fn").val();
  var filmlanguage= $("#fl").val();
  var filmtime = $("#ft").val();
  var operation = "add";
  var status = filmname!="" && filmname!=null && filmlanguage!="" && filmlanguage!=null && filmtime!="" && filmtime!=null;
  if(status){
    var data = {'filmname':filmname,'filmlanguage':filmlanguage,'filmtime':filmtime,'operation':operation};
    $.post("m/film.php",data,function () {
      alert("Insert success");
      location.href = "filmlist.php?1";
    });
  }
  else{
    alert("please input information");
  }
}

function updateFilm() {
  var filmnum = $("#fnum").val();
  var filmname = $("#fn").val();
  var filmlanguage= $("#fp").val();
  var filmtime= $("#ft").val();
  var operation = "update";
  //console.log(num+name+pwd+type);
  var data = {'filmnum':filmnum,'filmname':filmname,'filmlanguage':filmlanguage,'filmtime':filmtime,'operation':operation};
  $.post("film.php",data,function () {
    alert("update success");
    location.href = "filmlist.php?1";
  });
}

function delFilm(e) {
  var a = $(e);
  var filmnum = $.trim(a.parent().prevAll()[3].innerHTML);
  var operation = "del";
  //console.log(usernum);

  var data = {'filmnum':filmnum,'operation':operation};
  $.post("film.php",data,function () {
    alert("Del success");
    location.href = "filmlist.php?1";
  });
}

function getXhr(){//获取XMLHttpRequest对象
  var Xhr = null;
  if(window.XMLHttpRequest){ //其他浏览器
    Xhr = new XMLHttpRequest();
  }
  else{ //IE浏览器
    xhr = new ActiveXObeject("Microsoft XMLHttp");
  }
  return Xhr;
}

