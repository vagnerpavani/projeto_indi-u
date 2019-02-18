import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DetalhesProjetoComponent } from './detalhes-projeto.component';

describe('DetalhesProjetoComponent', () => {
  let component: DetalhesProjetoComponent;
  let fixture: ComponentFixture<DetalhesProjetoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DetalhesProjetoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DetalhesProjetoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
