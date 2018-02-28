var matchStr = {
    addToStorage:function (dataSinglePrefix,thisDataID,customPrefix) { //cn_datasingle_
        var start = thisDataID.indexOf('_');
        var category = thisDataID.substr(start + 1).toUpperCase();

        var dataSingle = LocalStorage.get(dataSinglePrefix + category,false);//get total from local
        if(dataSingle.status != 0)
            return dataSingle;
        //get Tr
        dataSingle = dataSingle.data;
        dataSingle = dataSingle.replace(/[\r\n]/g,'');
        var tr_reg = new RegExp('<tr class="(odd|even)" id=' + thisDataID + '>(.*?)</tr>', 'g');
        var datasingle_tr = dataSingle.match(tr_reg) || ['']
        //get custom
        var custom_str = LocalStorage.get(customPrefix + category,false);
        if(custom_str.status != 0 && custom_str.status != -2)
            return custom_str;
        //split custom_str
        var status = custom_str.status;
        custom_str = custom_str.data;
        var finalStr = '';
        if(status == -2){//no custom data stored
            var func_reg = new RegExp("function " + thisDataID + "_chart\\(\\){(.*?);}", "g");
            var datasingle_func = dataSingle.match(func_reg);
            if(datasingle_func)
                finalStr = datasingle_tr + "<" + "script" + ">" + datasingle_func[0] + " function runChart() {try {"+ thisDataID + "_chart();}catch(e){console.info(e.toString())}}</script>";
            else
                finalStr = datasingle_tr + "<" + "script" + ">"  + " try {}catch(e){console.info(e.toString())}}</script>";
        }else{//custom data stored
            custom_str = custom_str.replace(/[\r\n]/g,'');
            var trEnd = custom_str.indexOf('<script>');
            var before_tr = custom_str.substr(0,trEnd) || '';
            var after_tr = custom_str.substr(trEnd);
            var totalStr = before_tr + datasingle_tr[0] +  after_tr;
            //get try
            var tryIndex = totalStr.indexOf('try {');
            var beforeTry = totalStr.substr(0,tryIndex);
            var afterTry = totalStr.substr(tryIndex + 5);
            finalStr = beforeTry + 'try {' + thisDataID + '_chart();' + afterTry;
        }
        //combine tr
        LocalStorage.set(customPrefix + category,finalStr);
        return {status:0}
    },
    removeFromStorage:function (thisDataID,customPrefix) {
        try {
            var start = thisDataID.indexOf('_');
            var category = thisDataID.substr(start + 1).toUpperCase();
            var custom_str = LocalStorage.get(customPrefix + category, false);
            if (custom_str.status != 0)
                return custom_str;
            //get Tr
            custom_str = custom_str.data;
            custom_str = custom_str.replace(/[\r\n]/g,'');
            var tr_reg = new RegExp("<tr class=\"(odd|even)\" id=" + thisDataID + ">(.*?|)</tr>", "g");
            //get Func
            var func_reg1 = new RegExp(thisDataID + "_chart\\(\\);", "gmi");
            var replace_custom = custom_str.replace(tr_reg, '').replace(func_reg1,'');
            LocalStorage.set(customPrefix + category,replace_custom);
            return {status:0}
        }catch (e){
            console.info(e.toString())
        }
    },
    // getCustomFromCookies:function (language = 'cn',coin) {
    //     if(!$.cookie('custom'))
    //         return {status:-1,msg:'not set custom'}
    //     let arr_custom = $.cookie('custom').split(',');
    //     let result = LocalStorage.get(language + '_custom_area_' + coin);
    //    if(result.status != 0)//empty or expired
    //        return {status:-2,msg:'invalid data'};
    //     let custom_data = result.data;//get data
    //     for(let i in arr_custom){
    //         let func_reg = new RegExp("function " + arr_custom[i] + "_chart\\(\\){(.*?);}", "g");
    //         let datasingle_func = custom_data.match(func_reg);
    //         if(datasingle_func)
    //             finalStr = datasingle_tr + "<" + "script" + ">" + datasingle_func[0] + " function runChart() {try {"+ thisDataID + "_chart();}catch(e){console.info(e.toString())}}</script>";
    //         else
    //             finalStr = datasingle_tr + "<" + "script" + ">"  + " try {}catch(e){console.info(e.toString())}}</script>";
    //     }
    // }
}