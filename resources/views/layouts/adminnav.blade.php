
<div class="container mt-5">
	<a class= "btn btn-outline-dark"  href="/admin">
        Admin home
    </a>
    <a class= "{{ ($active === 'teachers')? 'btn btn-primary' : 'btn btn-outline-primary'  }}"  href="/admin/teachers">
        Teachers
    </a>
    <a class="{{ ($active === 'students')? 'btn btn-primary' : 'btn btn-outline-primary'  }}" href="/admin/students">
        Students
    </a>
    <a class="{{ ($active === 'courses')? 'btn btn-primary' : 'btn btn-outline-primary'  }}" href="/admin/courses">
        Courses
    </a>
</div>
