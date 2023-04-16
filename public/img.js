
//３ｍB を超えた画像をはじく
const fileLimit = 1024 * 1024 * 3;
const fileUploads = document.querySelectorAll('.upload-limit');
fileUploads.forEach(fileUpload => {
  fileUpload.addEventListener('change', () => {
    const files = fileUpload.files;
    for (const file of files) {
      if (file.size > fileLimit) {
        alert('ファイルサイズが3MBを超えています');
        fileUpload.value = "";
        return;
      }
    }
  })
});


//画像のプレビュー表示（未完成）
document.getElementById('img').addEventListener('change', function (e) {
    // 1枚だけ表示する
    var file = e.target.files[0];
    // ファイルのブラウザ上でのURLを取得する
    var blobUrl = window.URL.createObjectURL(file);
    // img要素に表示
    var img = document.getElementById('file-preview');
    img.src = blobUrl;
});

$('#imgFile').change(
    function () {
        if (!this.files.length) {
            return;
        }

        var file = $(this).prop('files')[0];
        var fr = new FileReader();
        $('.preview').css('background-image', 'none');
        fr.onload = function() {
            $('.preview').css('background-image', 'url(' + fr.result + ')');
        }
        fr.readAsDataURL(file);
        $(".preview img").css('opacity', 0);
    }
);


//ラジオボタン選択解除
var remove = 0;
function radioDeselection(already, numeric) {
  if(remove == numeric) {
    already.checked = false;
    remove = 0;
  } else {
    remove = numeric;
  }
}