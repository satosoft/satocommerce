


<div class="faq_accordion">
    @foreach($topCategory as $key=>$parent)
      @if(isset($parent->children))
        <div class="accordion_in">
          <div class="acc_head">
            <h3>{{$parent->categoryDescription?->name}}</h3>
          </div>
          <div class="acc_content">
              <ul class="panel-list">
               @foreach($parent->children as $key=>$child)
                  <li><a href="{{ route('category.products',['id' => $child->category_id]) }}">{{$child->categoryDescription?->name}}</a> </li>
               @endforeach
              </ul>
          </div>
        </div>
        @else
        <ul class="panel-list">
            <li>
              <a href="{{ route('category.products',['id' => $parent->category_id]) }}">{{$parent->categoryDescription?->name}}</a>
            </li>
        </ul>
      @endif

     @endforeach
</div>


<script>
    /*
// Function to handle the accordion toggle and store the clicked state
document.addEventListener("DOMContentLoaded", function () {
  // Get all the accordion headers
  const accordionHeaders = document.querySelectorAll('.acc_head');
  
  // Restore the clicked state from localStorage (if exists)
  const savedCategoryId = localStorage.getItem('clickedCategory');
  if (savedCategoryId) {
    // If there is a saved state, expand the corresponding accordion
    const savedAccordion = document.getElementById(savedCategoryId);
    if (savedAccordion) {
      savedAccordion.classList.add('active');  // Apply the active class to show the accordion
      const content = savedAccordion.nextElementSibling;  // The content of the accordion
      if (content) {
        content.style.display = 'block';  // Show the content
      }
    }
  }

  // Add event listeners to each accordion header to store the clicked state
  accordionHeaders.forEach(header => {
    header.addEventListener('click', function () {
      // Toggle the 'active' class to open/close the accordion
      const accordion = this.parentElement;
      const content = accordion.querySelector('.acc_content');

      if (content.style.display === 'block') {
        content.style.display = 'none';  // Close if open
        accordion.classList.remove('active');
      } else {
        content.style.display = 'block';  // Open if closed
        accordion.classList.add('active');
      }

      // Store the clicked category ID in localStorage
      const categoryId = accordion.id;  // Save the ID of the clicked accordion
      localStorage.setItem('clickedCategory', categoryId);
    });
  });
});

*/
</script>


<!--
<div class="faq_accordion">
    @foreach($topCategory as $key => $parent)
        @if(isset($parent->children))
            <div class="accordion_in {{-- $parent->category_id === $activeCategoryId ? 'active' : '' --}}">
                <div class="acc_head">
                    <h3>{{$parent->categoryDescription?->name}}</h3>
                </div>
                <div class="acc_content" style="{{-- isset($parent->children) && in_array($activeCategoryId, array_column($parent->children, 'category_id')) ? 'display:block;' : '' --}}">
                    <ul class="panel-list">
                        @foreach($parent->children as $child)
                            <li id="category-{{$child->category_id}}" class="{{-- $child->category_id === $activeCategoryId ? 'active' : '' --}}">
                                <a href="{{ route('category.products', ['id' => $child->category_id]) }}">
                                    {{$child->categoryDescription?->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <ul class="panel-list">
                <li class="{{-- $parent->category_id === $activeCategoryId ? 'active' : '' --}}">
                    <a href="{{-- route('category.products', ['id' => $parent->category_id]) --}}">
                        {{$parent->categoryDescription?->name}}
                    </a>
                </li>
            </ul>
        @endif
    @endforeach
</div>

<style>
  .faq_accordion .active {
    font-weight: bold;
    background-color: #f0f0f0; /* Example: change background for the active category */
}
</style>



<script>
    document.addEventListener("DOMContentLoaded", function () {
    const activeCategory = document.querySelector(".faq_accordion .active");
    if (activeCategory) {
        activeCategory.scrollIntoView({ behavior: "smooth", block: "center" });
    }
});
</script>

-->





