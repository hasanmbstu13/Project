function removeJsonFileData(jsonFileName, container, urlFunction)
{
    $.getJSON('../'+jsonFileName, function(data) {
        try
        {
            // var elementsArr = { elementsSaved: [] };
            var elementsArr = { categories: [], ads: [] };
            var inputs = container.find($("input:checked"));

            // if(data !== null && data.elementsSaved !== null && data.elementsSaved.length !== 0)
            if(data === null || (data !== null && data.categories !== null && data.categories.length === 0 && data.ads !== null && data.ads.length ===0))
            {
                // elementsArr.elementsSaved = data.elementsSaved;
                elementsArr.categories = data.categories;
                elementsArr.ads = data.ads;

            }

            inputs.each(function(){
                for(var i=0; i < elementsArr.categories.length ; i++)
                {
                    if($(this).attr('data-indexElement') === i)
                    {
                      elementsArr.categories.splice(i,1);
                      elementsArr.ads.splice(i,1);
                    }
                }
                $(this).parent().parent().remove();
            });

            saveToJsonFile(elementsArr, urlFunction);
        }
        catch(ex)
        {
            alert("Error on removeJsonFileData: " + ex + "\n Please contact the webmaster.")
        }
    });
}

function addNewElementInput(content, nameType, container, elementClass)
{
    try
    {
        var inputs = container.find(elementClass);

        container.append('<div class="checkbox">'
                                +'<label>test<input name="' + nameType + (inputs.length + 1) +'" type="checkbox" value="'+content+'" data-indexElement="'+(inputs.length + 1)+'">'
                                +content+
                                '</label>'
                                +'</div>');
    }
    catch(ex)
    {
        alert("Error on addNewElementInput: " + ex + "\n Please contact the webmaster.")
    }
}

function saveNewDataFromModal(txtInput, txtInput2, jsonFileName, nameType, container, elementClass, urlFunction)
{
    var txtInputValue = txtInput.val();

    if(!txtInputValue)
        return;

    var txtInputValue2 = txtInput2.val();

    if(!txtInputValue2)
    return;

    $.getJSON('../'+jsonFileName, function(data) {
        var elementsArr = { categories: [], ads: [] };

        if(data === null || (data !== null && data.categories !== null && data.categories.length === 0 && data.ads !== null && data.ads.length ===0))
        {
          elementsArr.categories.push(txtInputValue);
          elementsArr.ads.push(txtInputValue2);
        }
        else if(data !== null && data.categories !== null && data.categories.length !== 0 && data.ads !== null && data.ads.length !== 0)
        {
            data.categories.push(txtInputValue);
            elementsArr.categories = data.categories;

            data.ads.push(txtInputValue2);
            elementsArr.ads = data.ads;
        }

        saveToJsonFile(elementsArr, urlFunction);
        addNewElementInput(txtInputValue, nameType, container, elementClass);
        addNewElementInput(txtInputValue2, nameType, container, elementClass);
    });
}

function saveToJsonFile(dataArr, urlFunction){
    $.ajax
    ({
        type: "GET",
        dataType : 'json',
        url: urlFunction,
        async: false,
        data: { data: JSON.stringify(dataArr) },
        success: function () {},
        failure: function() {alert("Error in saveToJsonFile!");}
    });
}

$(document).ready(function(){
    $("#btnSaveNewCategory").click(function(){
        try
        {
            saveNewDataFromModal($("#txtNewCategory"), $("#txtHtmlCode"), 'Categories.json', 'category_'
            , $("#categoriesContainer"), $(".category"), 'http://suite.social/coder/tv/admin/saveCategory.php');
        }
        catch(ex)
        {
            alert("Error on ('#btnSaveNewCategory').click: " + ex + "\n Please contact the webmaster.")
        }
    });

    $("#btnSaveHtmlCode").click(function(){
        try
        {
            saveNewDataFromModal($("#txtHtmlCode"), 'AdminHtml.json', 'htmlCode_'
            , $("#htmlCodeContainer"), $(".htmlCode"), 'http://suite.social/coder/tv/admin/saveHtmlCode.php');
        }
        catch(ex)
        {
            alert("Error on ('#btnSaveNewCategory').click: " + ex + "\n Please contact the webmaster.")
        }

    });

    $("#btnDeleteHtmlCode").click(function(){
        try
        {
            removeJsonFileData('AdminHtml.json', $("#htmlCodeContainer"), 'http://suite.social/coder/tv/admin/saveHtmlCode.php');
        }
        catch(ex)
        {
            alert("Error on ('#btnSaveNewCategory').click: " + ex + "\n Please contact the webmaster.")
        }

    });

    $("#btnDeleteCategory").click(function(){
        try
        {
            removeJsonFileData('Categories.json', $("#categoriesContainer"), 'http://suite.social/coder/tv/admin/saveCategory.php');
        }
        catch(ex)
        {
            alert("Error on $('#btnDeleteCategory').click: " + ex + "\n Please contact the webmaster.")
        }
    });

});
