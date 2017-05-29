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

$('#UpdateUser').on('show.bs.modal', function (event) {
  var a = $(event.relatedTarget);
  //可以用此方式获取该行的标识，用于修改
  var num = a.parent().prevAll()[0].innerHTML; //从后往前数
  modal = $(this);
  modal.find("#fnum").val(num);
});

function update() {
  var num = $("#fnum").val();
  console.log(num);
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

