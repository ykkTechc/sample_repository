    window.onload = function(){
        /*各画面オブジェクト*/
        const btnSubmit = document.getElementById('btnConfirm');
        const inputName = document.getElementById('inputName');
        const inputKana = document.getElementById('inputKana');
        const inputMail = document.getElementById('inputMail');
        const inputBody = document.getElementById('inputBody');
        const reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/;
        
        
        btnConfirm.addEventListener('click', function(event) {
            let message = [];
            /*入力値チェック*/
            if(inputName.value ==""){
                message.push("氏名が未入力です。")
            }
            if(inputKana.value==""){
                message.push("フリガナが未入力です。")
            }
            if(inputBody.value==""){
              message.push("お問い合わせ内容が未入力です。");
            }
            if(inputMail.value==""){
                message.push("メールアドレスが未入力です。");
            }else if(!reg.test(inputMail.value)){
                message.push("メールアドレスの形式が不正です。");
            }
            if(message.length > 0){
                alert(message);
                return;
            }
        });
    };
