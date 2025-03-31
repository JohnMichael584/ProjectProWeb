import React, { useState, useEffect, useCallback, useMemo } from 'react';
import { AlertDialog, AlertDialogAction, AlertDialogCancel, AlertDialogContent, AlertDialogDescription, AlertDialogFooter, AlertDialogHeader, AlertDialogTitle } from '@/components/ui/alert-dialog';
import { Input } from '@/components/ui/input';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import { Label } from '@/components/ui/label';
import { Card } from '@/components/ui/card';
import { Loader2 } from 'lucide-react';

const TicketPurchaseForm = () => {
  const [formData, setFormData] = useState({
    fullName: '',
    email: '',
    phone: '',
    ticketType: '',
    quantity: 1,
    eventDay: ''
  });

  const [errors, setErrors] = useState({});
  const [totalPrice, setTotalPrice] = useState(0);
  const [isModalOpen, setIsModalOpen] = useState(false);
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [globalError, setGlobalError] = useState('');
  const [successMessage, setSuccessMessage] = useState('');

  // Memoized ticket types and event days
  const ticketTypes = useMemo(() => [
    { 
      id: 'early_bird', 
      name: 'Early Bird Ticket', 
      price: 120, 
      description: 'Limited availability. Access to all 3 days.',
      available: true 
    },
    { 
      id: 'standard', 
      name: 'Standard Ticket', 
      price: 240, 
      description: 'Full festival access with premium perks.',
      available: true 
    },
    { 
      id: 'vip', 
      name: 'VIP Experience', 
      price: 450, 
      description: 'Exclusive access, premium seating, and backstage passes.',
      available: true 
    }
  ], []);

  const eventDays = useMemo(() => [
    { value: 'day1', label: 'Day 1 - Friday, Dec 10', available: true },
    { value: 'day2', label: 'Day 2 - Saturday, Dec 11', available: true },
    { value: 'day3', label: 'Day 3 - Sunday, Dec 12', available: true },
    { value: 'all_days', label: 'All 3 Days', available: true }
  ], []);

  // Validation functions
  const validateName = useCallback((name) => {
    if (!name) return 'Full name is required';
    const trimmedName = name.trim();
    if (trimmedName.length < 2) return 'Name must be at least 2 characters';
    if (trimmedName.length > 50) return 'Name cannot exceed 50 characters';
    if (!/^[a-zA-Z\s'-]+$/.test(trimmedName)) return 'Name contains invalid characters';
    return '';
  }, []);

  const validateEmail = useCallback((email) => {
    if (!email) return 'Email is required';
    const trimmedEmail = email.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(trimmedEmail)) return 'Invalid email format';
    if (trimmedEmail.length > 100) return 'Email is too long';
    return '';
  }, []);

  const validatePhone = useCallback((phone) => {
    if (!phone) return 'Phone number is required';
    const trimmedPhone = phone.replace(/[\s()-]/g, '');
    const phoneRegex = /^(\+\d{1,3})?(\d{7,15})$/;
    if (!phoneRegex.test(trimmedPhone)) return 'Invalid phone number format';
    return '';
  }, []);

  // Calculate total price
  useEffect(() => {
    const selectedTicket = ticketTypes.find(ticket => ticket.id === formData.ticketType);
    const safeQuantity = Math.max(1, Math.min(10, formData.quantity));
    setTotalPrice(selectedTicket ? selectedTicket.price * safeQuantity : 0);
  }, [formData.ticketType, formData.quantity, ticketTypes]);

  // Handle input changes with real-time validation
  const handleInputChange = (e) => {
    const { name, value } = e.target;
    
    const sanitizedValue = name === 'quantity' 
      ? Math.max(1, Math.min(10, Number(value) || 1))
      : value;

    setFormData(prevState => ({
      ...prevState,
      [name]: sanitizedValue
    }));

    // Clear global error when user starts typing
    if (globalError) setGlobalError('');
    if (successMessage) setSuccessMessage('');

    // Validation
    let errorMessage = '';
    switch (name) {
      case 'fullName':
        errorMessage = validateName(sanitizedValue);
        break;
      case 'email':
        errorMessage = validateEmail(sanitizedValue);
        break;
      case 'phone':
        errorMessage = validatePhone(sanitizedValue);
        break;
    }

    setErrors(prev => ({
      ...prev,
      [name]: errorMessage || undefined
    }));
  };

  // Comprehensive form validation
  const validateForm = useCallback(() => {
    const newErrors = {};

    const nameError = validateName(formData.fullName);
    if (nameError) newErrors.fullName = nameError;

    const emailError = validateEmail(formData.email);
    if (emailError) newErrors.email = emailError;

    const phoneError = validatePhone(formData.phone);
    if (phoneError) newErrors.phone = phoneError;

    if (!formData.ticketType) {
      newErrors.ticketType = 'Please select a ticket type';
    }

    if (!formData.eventDay) {
      newErrors.eventDay = 'Please select an event day';
    }

    if (formData.quantity < 1 || formData.quantity > 10) {
      newErrors.quantity = 'Quantity must be between 1 and 10';
    }

    setErrors(newErrors);
    return Object.keys(newErrors).length === 0;
  }, [formData, validateName, validateEmail, validatePhone]);

  // Handle form submission
  const handleSubmit = (e) => {
    e.preventDefault();
    
    // Clear previous messages
    setGlobalError('');
    setSuccessMessage('');
    
    if (validateForm()) {
      setIsModalOpen(true);
    }
  };

  // Confirm purchase with robust error handling
  const confirmPurchase = async () => {
    if (isSubmitting) return;

    setIsSubmitting(true);
    setGlobalError('');
    
    try {
      // Simulate API call with error handling
      await new Promise((resolve, reject) => {
        setTimeout(() => {
          // Simulated network condition - 10% chance of failure for demo
          if (Math.random() > 0.1) {
            resolve();
          } else {
            reject(new Error('Payment processing failed. Please try again or use a different payment method.'));
          }
        }, 1500);
      });

      // Reset form on successful purchase
      setFormData({
        fullName: '',
        email: '',
        phone: '',
        ticketType: '',
        quantity: 1,
        eventDay: ''
      });
      
      setErrors({});
      setIsModalOpen(false);
      
      // Show success message
      setSuccessMessage('Purchase successful! Your tickets will be sent to your email within 5 minutes.');
      
      // Clear success message after 10 seconds
      setTimeout(() => setSuccessMessage(''), 10000);
    } catch (error) {
      // Set global error for display
      setGlobalError(error.message || 'An unexpected error occurred. Please try again later.');
    } finally {
      setIsSubmitting(false);
    }
  };

  // Get selected ticket details
  const selectedTicket = useMemo(() => 
    ticketTypes.find(t => t.id === formData.ticketType),
    [formData.ticketType, ticketTypes]
  );

  // Get selected event day details
  const selectedEventDay = useMemo(() => 
    eventDays.find(d => d.value === formData.eventDay),
    [formData.eventDay, eventDays]
  );

  return (
    <div className="max-w-2xl mx-auto p-6">
      <Card className="p-6 bg-gradient-to-br from-white/10 to-white/5 backdrop-blur-lg rounded-xl shadow-2xl">
        <h2 className="text-3xl font-bold text-center mb-6 text-transparent bg-clip-text bg-gradient-to-r from-pink-500 to-purple-600">
          Get Your Festival Tickets
        </h2>
        
        {globalError && (
          <div className="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span className="block sm:inline">{globalError}</span>
          </div>
        )}
        
        {successMessage && (
          <div className="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span className="block sm:inline">{successMessage}</span>
          </div>
        )}
        
        <form onSubmit={handleSubmit} noValidate className="space-y-4">
          <div className="space-y-2">
            <Label htmlFor="fullName">Full Name *</Label>
            <Input 
              id="fullName"
              name="fullName"
              value={formData.fullName}
              onChange={handleInputChange}
              placeholder="Enter your full name"
              className={`w-full ${errors.fullName ? 'border-red-500' : ''}`}
              disabled={isSubmitting}
            />
            {errors.fullName && <p className="text-red-500 text-sm">{errors.fullName}</p>}
          </div>

          <div className="space-y-2">
            <Label htmlFor="email">Email *</Label>
            <Input 
              id="email"
              name="email"
              type="email"
              value={formData.email}
              onChange={handleInputChange}
              placeholder="Enter your email"
              className={`w-full ${errors.email ? 'border-red-500' : ''}`}
              disabled={isSubmitting}
            />
            {errors.email && <p className="text-red-500 text-sm">{errors.email}</p>}
          </div>

          <div className="space-y-2">
            <Label htmlFor="phone">Phone Number *</Label>
            <Input 
              id="phone"
              name="phone"
              type="tel"
              value={formData.phone}
              onChange={handleInputChange}
              placeholder="Enter your phone number"
              className={`w-full ${errors.phone ? 'border-red-500' : ''}`}
              disabled={isSubmitting}
            />
            {errors.phone && <p className="text-red-500 text-sm">{errors.phone}</p>}
          </div>

          <div className="space-y-2">
            <Label htmlFor="ticketType">Ticket Type *</Label>
            <Select 
              name="ticketType"
              value={formData.ticketType}
              onValueChange={(value) => {
                handleInputChange({ 
                  target: { 
                    name: 'ticketType', 
                    value 
                  } 
                });
              }}
              disabled={isSubmitting}
            >
              <SelectTrigger className={`w-full ${errors.ticketType ? 'border-red-500' : ''}`}>
                <SelectValue placeholder="Select ticket type" />
              </SelectTrigger>
              <SelectContent>
                {ticketTypes.map(ticket => (
                  <SelectItem 
                    key={ticket.id} 
                    value={ticket.id}
                    disabled={!ticket.available}
                  >
                    <div className="flex justify-between items-center">
                      <span>{ticket.name}</span>
                      <span className="ml-2 font-medium">${ticket.price}</span>
                    </div>
                  </SelectItem>
                ))}
              </SelectContent>
            </Select>
            {errors.ticketType && <p className="text-red-500 text-sm">{errors.ticketType}</p>}
            {selectedTicket && (
              <p className="text-sm text-muted-foreground">{selectedTicket.description}</p>
            )}
          </div>

          <div className="space-y-2">
            <Label htmlFor="eventDay">Event Day *</Label>
            <Select 
              name="eventDay"
              value={formData.eventDay}
              onValueChange={(value) => {
                handleInputChange({ 
                  target: { 
                    name: 'eventDay', 
                    value 
                  } 
                });
              }}
              disabled={isSubmitting}
            >
              <SelectTrigger className={`w-full ${errors.eventDay ? 'border-red-500' : ''}`}>
                <SelectValue placeholder="Select event day" />
              </SelectTrigger>
              <SelectContent>
                {eventDays.map(day => (
                  <SelectItem 
                    key={day.value} 
                    value={day.value}
                    disabled={!day.available}
                  >
                    {day.label}
                  </SelectItem>
                ))}
              </SelectContent>
            </Select>
            {errors.eventDay && <p className="text-red-500 text-sm">{errors.eventDay}</p>}
          </div>

          <div className="space-y-2">
            <Label htmlFor="quantity">Ticket Quantity (1-10) *</Label>
            <Input 
              id="quantity"
              name="quantity"
              type="number"
              min={1}
              max={10}
              value={formData.quantity}
              onChange={handleInputChange}
              className={`w-full ${errors.quantity ? 'border-red-500' : ''}`}
              disabled={isSubmitting}
            />
            {errors.quantity && <p className="text-red-500 text-sm">{errors.quantity}</p>}
          </div>
          
          <div className="pt-4">
            <Card className="p-4 text-center">
              <p className="text-xl font-semibold">
                Total Price: <span className="text-primary">${totalPrice.toLocaleString()}</span>
              </p>
              {formData.quantity > 1 && (
                <p className="text-sm text-muted-foreground mt-1">
                  {formData.quantity} × ${selectedTicket?.price || 0} per ticket
                </p>
              )}
            </Card>
          </div>

          <button 
            type="submit" 
            disabled={isSubmitting}
            className={`w-full p-3 text-white font-bold rounded-lg transition-all flex items-center justify-center
              ${isSubmitting 
                ? 'bg-gray-400 cursor-not-allowed' 
                : 'bg-gradient-to-r from-pink-500 to-purple-600 hover:from-purple-600 hover:to-pink-500'}`}
          >
            {isSubmitting ? (
              <>
                <Loader2 className="mr-2 h-4 w-4 animate-spin" />
                Processing...
              </>
            ) : 'Proceed to Payment'}
          </button>
        </form>

        <AlertDialog open={isModalOpen} onOpenChange={setIsModalOpen}>
          <AlertDialogContent>
            <AlertDialogHeader>
              <AlertDialogTitle>Confirm Your Purchase</AlertDialogTitle>
              <AlertDialogDescription>
                <div className="mt-4 space-y-3">
                  <p><strong>Name:</strong> {formData.fullName}</p>
                  <p><strong>Email:</strong> {formData.email}</p>
                  <p><strong>Ticket Type:</strong> {selectedTicket?.name}</p>
                  <p><strong>Quantity:</strong> {formData.quantity}</p>
                  <p><strong>Event Day:</strong> {selectedEventDay?.label}</p>
                  <p className="pt-2 font-bold text-lg">
                    Total: ${totalPrice.toLocaleString()}
                  </p>
                  {selectedTicket?.description && (
                    <p className="text-sm text-muted-foreground pt-2">
                      <strong>Includes:</strong> {selectedTicket.description}
                    </p>
                  )}
                </div>
              </AlertDialogDescription>
            </AlertDialogHeader>
            <AlertDialogFooter>
              <AlertDialogCancel disabled={isSubmitting}>Cancel</AlertDialogCancel>
              <AlertDialogAction 
                onClick={confirmPurchase} 
                disabled={isSubmitting}
                className="bg-primary hover:bg-primary/90"
              >
                {isSubmitting ? (
                  <>
                    <Loader2 className="mr-2 h-4 w-4 animate-spin" />
                    Processing...
                  </>
                ) : 'Confirm Purchase'}
              </AlertDialogAction>
            </AlertDialogFooter>
          </AlertDialogContent>
        </AlertDialog>
      </Card>
    </div>
  );
};

export default TicketPurchaseForm;