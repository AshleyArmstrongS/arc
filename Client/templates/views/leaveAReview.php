<style>
    * {
        margin: 0;
        padding: 0;
    }

    .rate {
        float: left;
        height: 46px;
        padding: 0 10px;
    }

    .rate:not(:checked)>input {
        position: absolute;
        top: -9999px;
    }

    .rate:not(:checked)>label {
        float: right;
        width: 1em;
        overflow: hidden;
        white-space: nowrap;
        cursor: pointer;
        font-size: 30px;
        color: #ccc;
    }

    .rate:not(:checked)>label:before {
        content: '★ ';
    }

    .rate>input:checked~label {
        color: blueviolet;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
        color: blue;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
        color: blue;
    }
</style>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="panel-heading">
                <div class="card-header">
                    <h3 class="panel-title">Leave a review!</h3>
                    <form id='review' action='' method='post'>
                        <div class="rate" >
                            <input type="radio" name = "stars" id="star5" name="rate" value="5" />
                            <label for="star5" title="text">5 stars</label>
                            <input type="radio" name = "stars" id="star4" name="rate" value="4" />
                            <label for="star4" title="text">4 stars</label>
                            <input type="radio" name = "stars" id="star3" name="rate" value="3" />
                            <label for="star3" title="text">3 stars</label>
                            <input type="radio" name = "stars" id="stars" name="rate" value="2" />
                            <label for="star2" title="text">2 stars</label>
                            <input type="radio" name = "stars" id="star1" name="rate" value="1" />
                            <label for="star1" title="text">1 star</label>
                        </div>
                        <label for="review" class="sr-only">review</label>
                        <textarea rows="4" cols="5" name="review" class="form-control" placeholder="Review" required></textarea>
                        <div class="form-group">
                            <select name="reccommend" id="reccommend" class="form-control">
                                <option value="">Would you reccommend?</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        <input type="hidden" name = "driver_id" id = "driver_id" value = "<?=$locals['driver_id'];?>">
                        <input type="submit" value="leaveReview" class="btn btn-info btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>