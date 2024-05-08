//top画面アコーディオンメニュー
$(function () {
  $(".accordion_btn").on("click", function () {
    $('.accordion_container').slideToggle(200);
    $(this).toggleClass("open", 200);
  });
});

//投稿の編集モーダル画面表示
$(function () {
  // 編集ボタン（btn_edit）をクリックされたら機能する
  $(".js_modal_open").on("click", function () {
    //モーダルの中身(js_modal)を表示する
    $(".js_modal").fadeIn();
    //押されたボタンから投稿内容を取得し、変数（post）へ格納
    var post = $(this).attr("post");
    //押されたボタンから投稿のidを取得し、変数（post_id）へ格納
    var post_id = $(this).attr("post_id");

    //取得した投稿内容をモーダルの中身へ送る
    $(".modal_post").text(post);
    //取得した投稿のidをモーダルの中身へ送る
    $(".modal_id").val(post_id);
    return false;
  });

  //背景や閉じるボタン（.js_modal_close）が押されたら機能する
  $(".js_modal_close").on("click", function () {
    //モーダルの中身(class="js_modal")を非表示
    $(".js_modal").fadeOut();
    return false;
  });
});

//プロフィール編集画面のアイコン画像アップロード
//変数に代入
const file_image = document.getElementById("file_image");
const file_button = document.getElementById("file_button");
//file_imageボタンがクリックされたら、filebutton（inputタグ）が実行されるように記述
file_image.addEventListener("click", (e) => {
  if (file_button) {
    file_button.click();
  }
}, false);
