import { TestBed } from '@angular/core/testing';

import { CriarProjetoService } from './criar-projeto.service';

describe('CriarProjetoService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: CriarProjetoService = TestBed.get(CriarProjetoService);
    expect(service).toBeTruthy();
  });
});
