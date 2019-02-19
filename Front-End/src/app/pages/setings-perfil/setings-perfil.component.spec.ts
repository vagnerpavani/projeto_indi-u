import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { SetingsPerfilComponent } from './setings-perfil.component';

describe('SetingsPerfilComponent', () => {
  let component: SetingsPerfilComponent;
  let fixture: ComponentFixture<SetingsPerfilComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SetingsPerfilComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SetingsPerfilComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
