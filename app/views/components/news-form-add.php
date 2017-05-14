<div id="result"></div>
<form method="POST">
    <div class="form-group">
        <label for="news-title">News Title</label>
        <input type="text" class="form-control" id="news-title" aria-describedby="titleHelp" placeholder="Enter news title">
        <small id="titleHelp" class="form-text text-muted">Please enter good news title.</small>
    </div>
    <div class="form-group">
        <label for="news-text">News text</label>
        <textarea class="form-control" id="news-text" rows="3"></textarea>
    </div>
    <button type="button" id="newsAdd" class="btn btn-primary">Submit</button>
</form>