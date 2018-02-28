import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { KasifComponent } from './kasif.component';

describe('KasifComponent', () => {
  let component: KasifComponent;
  let fixture: ComponentFixture<KasifComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ KasifComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(KasifComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
