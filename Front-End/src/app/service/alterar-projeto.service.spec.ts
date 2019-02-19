import { TestBed } from '@angular/core/testing';

import { AlterarProjetoService } from './alterar-projeto.service';

describe('AlterarProjetoService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: AlterarProjetoService = TestBed.get(AlterarProjetoService);
    expect(service).toBeTruthy();
  });
});
