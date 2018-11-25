<div class="container">
    <a class= "{{ ($active === 'teachers')? 'btn btn-success' : 'btn btn-outline-primary'  }}"  href="/teachers">
        Teachers
    </a>
    <a class="{{ ($active === 'students')? 'btn btn-success' : 'btn btn-outline-primary'  }}" href="/students">
        students
    </a>
    <a class="{{ ($active === 'courses')? 'btn btn-success' : 'btn btn-outline-primary'  }}" href="/courses">
        courses
    </a>
</div>