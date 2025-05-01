function clicked(e)
{
    if(!confirm('Er du sikker på at du vil logge ut?')) {
        e.preventDefault();
    }
}