import { TestBed } from '@angular/core/testing';

import { DetalhesProjetoService } from './detalhes-projeto.service';

describe('DetalhesProjetoService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: DetalhesProjetoService = TestBed.get(DetalhesProjetoService);
    expect(service).toBeTruthy();
  });
});
