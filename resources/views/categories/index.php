<div style="border: 1px solid red;">
        <ul>
<?php foreach($categoryList as $category): ?>
    
            <li><a href="<?=route('categories.show', [ 'name' => $category['name']])?>"><?=$category['name']?></li>
       
<?php endforeach; ?>
</ul>
    </div>