<style>
.container {
  width: 800px;
  margin: 50px auto;
}
.text-center {
  text-align: center;
}
.panel {
  margin-bottom: 20px;
  background-color: #fff;
  border: 1px solid transparent;
  border-radius: 4px;
  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
  box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}
.panel-primary {
border-color: #fc7210;
}
.panel-heading {
  padding: 10px 15px;
  border-bottom: 1px solid transparent;
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.panel-primary .panel-heading {
  border-color: #e4711f;
  color: #fff;
  background-color: #fc7210;
}
.panel-title {
  margin-top: 0;
  margin-bottom: 0;
  font-size: 16px;
  color: inherit;
}

.panel-body {
  padding: 15px;
  font-family: 'lato';
  font-size: 16px;
  line-height: 1.5em;
  color: #777;
}

.panel-footer {
  padding: 10px 15px;
  background-color: #f5f5f5;
  border-top: 1px solid #ddd;
  border-bottom-right-radius: 3px;
  border-bottom-left-radius: 3px;
}

.btn {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: 400;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
  touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;
  text-decoration: none;

}
.btn-danger {
  color: #fff;
  background-color: #d9534f;
  border-color: #d43f3a;
}
</style>
<div class="container">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Welcome With Us</h3>
  </div>
  <div class="panel-body">
    <div class="info">
      Welcome to ProSearch for Web Searching,

      Thank you for creating account with us. The ProSearch can easily help you to reach to the people by diffrent way and it can make poeple reach to you by useful diffrenet ways. Visit your profile to add the information that you want.
    </div>
  </div>
  <div class="panel-footer">
    <a href="{{route('profile')}}" class="btn btn-danger">You can visit your profile here</a>
  </div>
</div>
</div>
