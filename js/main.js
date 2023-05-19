$(function() {
    favorite();
});

// お気に入り機能
const favorite = () => {
    let fav = [];
    const current_page_id = $('.favoriteButton').data('pageid');//現在のページのIDを取得
    checked_inspect();//現在のページがお気に入り登録済みかチェック
    $(document).on('click','.favoriteButtonIn',function(){
        const index = fav.indexOf(current_page_id);
        if(index > -1){
            fav.splice(index, 1);
        } else {
            fav.push(current_page_id);
        }
        const serializedArr = JSON.stringify( fav );
        $.cookie('favItem',serializedArr, { expires: 7, path: '/' });//cookieを保存
        checked_inspect();
    });
    function checked_inspect(){//現在のページがお気に入り登録されているかどうか
        fav = $.cookie('favItem') ? JSON.parse( $.cookie('favItem') ) : [];
        console.log(fav);
        if(fav.indexOf(current_page_id) > -1){
            $('body').addClass('is-choosen');
        } else {
            $('body').removeClass('is-choosen');
        }
    }
}