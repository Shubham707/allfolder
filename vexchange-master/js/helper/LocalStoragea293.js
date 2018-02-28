var LocalStorage = (function (ls) {
    function isExpired(name) {
        var oldTime = ls.getItem(name);
        if(!oldTime) return true;
        var intOldTime = parseInt(oldTime);
        var currentTime = new Date().getTime();
        var expireTime = (currentTime - intOldTime)/1000/60/5;
        return expireTime > 1;
    }
        return {
            get:function (name,checkExpired) {
                if(!ls)
                    return {status:-1,msg:'storage is unavailable'};
                else{
                    //if expired
                    if(checkExpired){
                        var isExpired_var = isExpired(name + '_time');
                        if(isExpired_var)
                            return {status:-3,msg:'expired'};
                    }
                    return ls.getItem(name)?{status:0,msg:'get success',data:ls.getItem(name)}:{status:-2,msg:'not store'};
                }
            },
            set:function (name,value) {
                if(!ls)
                    return {status:-1,msg:'storage is unavailable'};
                else{
                    ls.setItem(name,value);//store value
                    var currentTime = new Date().getTime();
                    ls.setItem(name + '_time',currentTime.toString());//store update time
                    return {status:0,msg:'store success'};
                }
            }
        }
})(window.localStorage)