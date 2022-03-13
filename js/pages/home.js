$(function() {
    $('.modal').modal();
    function getQueryString()
    {
        //let url = windows.location.href;
        //let indexOfQuesMark = url.indexOf('?');
        // let queryString = yrl.slice(indexOfQuesMark+1);
        //let queryParams = queryString.split('&');
        let queryParams = window.location.href.slice(window.location.href.indexOf('?')+1).split('&');
        let vars = [];
        queryParams.forEach(param => {
            let pair = param.split('=');
            let key = pair[0];
            let value =  pair[1];
            vars[key] = value;
        });
        return vars;
    }

    let query = getQueryString();
    let operation = query['op'];
    let status = query['status'];
    if(operation === 'add' && status === 'success')
    {
        M.toast({
            html: 'Contact added sucessfully',
            classes: 'green darken-1'
        });
    }
});