import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AlterarProjetosComponent } from './alterar-projetos.component';

describe('AlterarProjetosComponent', () => {
  let component: AlterarProjetosComponent;
  let fixture: ComponentFixture<AlterarProjetosComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AlterarProjetosComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AlterarProjetosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
