$(document).on('change', '#add-dish-form #photo-plat', function()
{
    ReadURL(this);
});

function ReadURL(input)
{
    if (input.files && input.files[0])
    {
        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

        if (ext == "png" || ext == "jpeg" || ext == "jpg")
        {
            var reader = new FileReader();

            reader.onload = function(e)
            {
                var form = document.getElementById('add-dish-form');
                var elmt = form.getElementsByClassName('block-add-picture')[0];
                elmt.innerHTML = '<img src="' + e.target.result + '">';
            }

            reader.readAsDataURL(input.files[0]);
        }
        else
            alert('Vous devez choisir une image au format .jpg, .png ou .jpeg');
    }
}

function preventDefault(e)
{
    e.preventDefault();
    e.stopPropagation();
}

document.getElementById('dish-picture').addEventListener('dragenter', preventDefault, false);
document.getElementById('dish-picture').addEventListener('dragleave', preventDefault, false);
document.getElementById('dish-picture').addEventListener('dragover', preventDefault, false);
document.getElementById('dish-picture').addEventListener('drop', preventDefault, false);
document.getElementById('dish-picture').addEventListener('drop', handleDrop, false);

function handleFiles(files)
{
    for (var i = 0, len = files.length; i < len; i++)
    {
        dropImage(files[i]);
    }
}

function handleDrop(e)
{
    var data = e.dataTransfer,
        files = data.files;

    handleFiles(files);
}

function dropImage(file)
{
    var reader = new FileReader();

    reader.onload = function(e)
    {
        var form = document.getElementById('add-dish-form');
        var elmt = form.getElementsByClassName('block-add-picture')[0];
        elmt.innerHTML = '<img src="' + e.target.result + '">';
    }

    reader.readAsDataURL(file);
}